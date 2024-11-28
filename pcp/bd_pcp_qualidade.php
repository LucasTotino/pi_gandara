<?php
require "../utils/conexao.php";

// Função para retornar uma resposta em JSON
function retornarResposta($status, $mensagem) {
    echo json_encode(["status" => $status, "message" => $mensagem]);
    exit;

}

// IF normal
if (isset($_POST['nome_plantio']) && !empty($_POST['nome_plantio'])) {
    $nomePlantio = $_POST['nome_plantio'];
} else {
    $nomePlantio = null;
}
// IF TERNÁRIO
// Usado quando há uma condição para preenchimento de uma variavel.
// Ex: colocar o valor do POST se ele existir, se não deixar em branco.

// variavel = condição ? se VERDADEIRO : se FALSE;
$dataMedicao = isset($_POST['data_medicao']) && !empty($_POST['data_medicao']) ? $_POST['data_medicao'] : null;
$diametroMed = isset($_POST['diametro_med']) && !empty($_POST['diametro_med']) ? $_POST['diametro_med'] : null;
$conformidadeVenda = isset($_POST['conformidade_venda']) && !empty($_POST['conformidade_venda']) ? $_POST['conformidade_venda'] : null;
$idQualidade = $_POST['id_qualidade'] ?? null;
$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if ($acao == "INCLUIR") {
    // As ? serão trocadas pelos valores dos campos pelo PHP
    $sql = "INSERT INTO qualidade (nome_plantio, data_medicao, diametro_med, conformidade_venda) 
    VALUE (?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJETION
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP
    $stmt = $conn->prepare($sql);

    // A função bind_param insere as variaveis no lugar das ?
    // O primeiro parametro é o tipo do dado, os demais são as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decimais), s = texto (tudo que não é numero)
    $stmt->bind_param(
        "ssss",
        $nomePlantio,
        $dataMedicao,
        $diametroMed,
        $conformidadeVenda

    );


    // A função execute envia o script SQL todo arrumado para o BD, com as variaveis
    // nos lugares das ?.
    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idqualidade = $conn->insert_id;
            echo $idqualidade;

            header('Location: /pi_gandara/pcp/qualidade.php');
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

} else if ($acao == "ALTERAR" && $idQualidade) {{
        $sql = "UPDATE qualidade SET 
       nome_plantio = ?, 
       data_medicao = ?, 
       diametro_med = ?, 
       conformidade_venda = ?
       WHERE id_qualidade= ?;";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssssi",
            $nomePlantio,
            $dataMedicao,
            $diametroMed,
            $conformidadeVenda,
            $idQualidade
        );
    }

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/pcp/qualidade.php');
            exit;
        } else {
            echo "Erro ao atualizar: " . $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
        ?>
        <script>history.back();</script>
        <?php
    }

    // Fecha o Prepared Statament
    $stmt->close();
    // Fecha a conexão
    $conn->close();

} else if ($acao == "DELETAR" && $idQualidade) {
    // Neste bloco será excluido um registro que já existe no BD.
    $$idQualidade = filter_var($idQualidade, FILTER_VALIDATE_INT);
    if (!$idQualidade) {
        retornarResposta("erro", "ID inválido para exclusão.");
    }


    $sql = "DELETE FROM qualidade WHERE id_qualidade = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idQualidade);

    if ($stmt) {
        $stmt->bind_param("i", $idQualidade);

        if ($stmt->execute()) {
            retornarResposta("sucesso", "Registro excluído com sucesso!");
        } else {
            retornarResposta("erro", "Erro ao excluir registro: " . $stmt->error);
        }
    } else {
        retornarResposta("erro", "Erro na preparação da consulta: " . $conn->error);
    }
} else {
    retornarResposta("erro", "Ação inválida ou ID não fornecido.");
}
?>