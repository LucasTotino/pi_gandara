<?php
require "../utils/conexao.php";

// Função para retornar uma resposta em JSON
function retornarResposta($status, $mensagem)
{
    echo json_encode(["status" => $status, "message" => $mensagem]);
    exit;
}

// IF normal
if (isset($_POST['nome_insumo']) && !empty($_POST['nome_insumo'])) {
    $nome_insumo = $_POST['nome_insumo'];
} else {
    $nome_insumo = null;
}
// IF TERNÁRIO
// Usado quando há uma condição para preenchimento de uma variavel.
// Ex: colocar o valor do POST se ele existir, se não deixar em branco.

// variavel = condição ? se VERDADEIRO : se FALSE;
$cod_ref = isset($_POST['cod_ref']) && !empty($_POST['cod_ref']) ? $_POST['cod_ref'] : null;
$qtde_utilizada = isset($_POST['qtde_utilizada']) && !empty($_POST['qtde_utilizada']) ? $_POST['qtde_utilizada'] : null;
$unidade = isset($_POST['unidade']) && !empty($_POST['unidade']) ? $_POST['unidade'] : null;
$prazo_util = isset($_POST['prazo_util']) && !empty($_POST['prazo_util']) ? $_POST['prazo_util'] : null;

$idCadastro_insumo = $_POST['id_solicitacao_cad'] ?? null;
$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if ($acao == "INCLUIR") {
    // As ? serão trocadas pelos valores dos campos pelo PHP
    $sql = "INSERT INTO cadastro_insumo (nome_insumo, cod_ref, qtde_utilizada, unidade, prazo_util) 
    VALUE (?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJETION
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP
    $stmt = $conn->prepare($sql);

    // A função bind_param insere as variaveis no lugar das ?
    // O primeiro parametro é o tipo do dado, os demais são as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decimais), s = texto (tudo que não é numero)
    $stmt->bind_param(
        "sssss",
        $nome_insumo,
        $cod_ref,
        $qtde_utilizada,
        $unidade,
        $prazo_util
    );


    // A função execute envia o script SQL todo arrumado para o BD, com as variaveis
    // nos lugares das ?.
    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idCadastro_insumo = $conn->insert_id;
            echo $idCadastro_insumo;

            header('Location: /pi_gandara/pcp/cadastroInsumo.php');
        } else {
            echo $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao cadastrar!";
        // Vamos utilizar JS para poder recuperar os dados digitados
?>
        <script>
            history.back();
        </script>
    <?php
    }

    // Fecha o Prepared Statament
    $stmt->close();
    // Fecha a conexão
    $conn->close();

    // Exibe o POST caso o IF apresente erro.
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
} else if ($acao == "ALTERAR" && $idCadastro_insumo) { {
        $sql = "UPDATE cadastro_insumo SET 
       nome_insumo = ?, 
       cod_ref = ?, 
       qtde_utilizada = ?, 
       unidade = ?, 
       prazo_util = ?
       WHERE id_solicitacao_cad = ?;";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "sssssi",
            $nome_insumo,
            $cod_ref,
            $qtde_utilizada,
            $unidade,
            $prazo_util,
            $idCadastro_insumo
        );
    }

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/pcp/cadastroinsumo.php');
            exit;
        } else {
            echo "Erro ao atualizar: " . $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
    ?>
        <script>
            history.back();
        </script>
<?php
    }
} else if ($acao == "DELETAR" && $idCadastro_insumo) {


    // Valida o ID
    $idCadastro_insumo = filter_var($idCadastro_insumo, FILTER_VALIDATE_INT);
    if (!$idCadastro_insumo) {
        retornarResposta("erro", "ID inválido para exclusão.");
    }

    // Neste bloco será excluido um registro que já existe no BD.

    $sql = "DELETE FROM cadastro_insumo WHERE id_solicitacao_cad = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $idCadastro_insumo);

        if ($stmt->execute()) {
            retornarResposta("sucesso", "Solicitação de cadastro excluída com sucesso!");
        } else {
            retornarResposta("erro", "Erro ao excluir solicitação de cadastro: " . $stmt->error);
        }
    } else {
        retornarResposta("erro", "Erro na preparação da consulta: " . $conn->error);
    }
} else {
    retornarResposta("erro", "Ação inválida ou ID não fornecido.");
}
?>