<?php
require "../utils/conexao.php";

// IF normal
if (isset($_POST['id_nome_plantio']) && !empty($_POST['id_nome_plantio'])) {
    $nomePlantio = $_POST['id_nome_plantio'];
} else {
    $nomePlantio = null;
}
// IF TERNÁRIO
// Usado quando há uma condição para preenchimento de uma variavel.
// Ex: colocar o valor do POST se ele existir, se não deixar em branco.

// variavel = condição ? se VERDADEIRO : se FALSE;
$dataMedicao = isset($_POST['dataMedicao']) && !empty($_POST['dataMedicao']) ? $_POST['dataMedicao'] : null;
$diametroFruto = isset($_POST['diametroFruto']) && !empty($_POST['diametroFruto']) ? $_POST['diametroFruto'] : null;
$adubacao = isset($_POST['adubacao']) && !empty($_POST['adubacao']) ? $_POST['adubacao'] : null;
$praga = isset($_POST['praga']) && !empty($_POST['praga']) ? $_POST['praga'] : null;
$obsMedicao = isset($_POST['obsMedicao']) && !empty($_POST['obsMedicao']) ? $_POST['obsMedicao'] : null;

$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if ($acao == "INCLUIR") {
    // As ? serão trocadas pelos valores dos campos pelo PHP
    $sql = "INSERT INTO medicao_producao (id_nome_plantio, data_medicao, diametro_fruto, adubacao, praga, obs_medicao) 
    VALUE (?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJETION
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP
    $stmt = $conn->prepare($sql);

    // A função bind_param insere as variaveis no lugar das ?
    // O primeiro parametro é o tipo do dado, os demais são as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decimais), s = texto (tudo que não é numero)
    $stmt->bind_param(
        "ssssss",
        $nomePlantio,
        $dataMedicao,
        $diametroFruto,
        $adubacao,
        $praga,
        $obsMedicao

    );

    // A função execute envia o script SQL todo arrumado para o BD, com as variaveis
    // nos lugares das ?.
    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idMedicao = $conn->insert_id;
            echo $idMedicao;

            header('Location: /pi_gandara/pcp');
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

} else if ($acao == "ALTERAR") {{
        $sql = "UPDATE medicao_producao SET 
       id_nome_plantio = ?, 
       data_medicao = ?, 
       diametro_fruto = ?, 
       adubacao = ?, 
       praga = ?, 
       obs_medicao = ?
       WHERE id_medicao = ?;";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "sssssss",
            $nomePlantio,
            $dataMedicao,
            $diametroFruto,
            $adubacao,
            $praga,
            $obsMedicao,
            $id_medicao

        );
    }

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/pcp');
        } else {
            echo $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao ATUALIZAR!";
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

} else if ($acao == "DELETAR") {
    // Neste bloco será excluido um registro que já existe no BD.

    $sql = "DELETE FROM medicao_producao WHERE id_medicao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
         echo json_encode(
              array(
                   "status" => "sucesso",
                   "message" => "Registro excluído com sucesso!"
              )
         );
    } else {
         echo json_encode(
              array(
                   "status" => "erro",
                   "message" => "Erro ao excluir o registro: " . $stmt->error
              )
         );
    }
    // Fecha o Prepared Statament
    $stmt->close();
    // Fecha a conexão
    $conn->close();

} else {
    // Se nenhuma das operações for solicitada, volta para o inicio do site.
    // A função header modifica o cabeçalho do navegador
    // Ao passar a propriedade location, definimos para qual URL o navegador deve ir.
    header("Location: /pi_gandara/");
    exit;
}
?>