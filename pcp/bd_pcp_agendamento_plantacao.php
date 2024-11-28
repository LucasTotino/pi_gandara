<?php
require "../utils/conexao.php";

// Função para retornar uma resposta em JSON
function retornarResposta($status, $mensagem)
{
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
$areaPlantio = isset($_POST['area_plantio']) && !empty($_POST['area_plantio']) ? $_POST['area_plantio'] : null;
$dataPlantio = isset($_POST['data_plantio']) && !empty($_POST['data_plantio']) ? $_POST['data_plantio'] : null;
$dataColheita = isset($_POST['data_colheita']) && !empty($_POST['data_colheita']) ? $_POST['data_colheita'] : null;
$espacoMuda = isset($_POST['espacamento_mudas']) && !empty($_POST['espacamento_mudas']) ? $_POST['espacamento_mudas'] : null;
$fruto = isset($_POST['fruto']) && !empty($_POST['fruto']) ? $_POST['fruto'] : null;
$idAgendamento = $_POST['id_agendamento'] ?? null;
$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if ($acao == "INCLUIR") {
    // As ? serão trocadas pelos valores dos campos pelo PHP
    $sql = "INSERT INTO agendamento_plantacao (nome_plantio, area_plantio, data_plantio, data_colheita, espacamento_mudas, fruto) 
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
        $areaPlantio,
        $dataPlantio,
        $dataColheita,
        $espacoMuda,
        $fruto

    );

    // A função execute envia o script SQL todo arrumado para o BD, com as variaveis
    // nos lugares das ?.
    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idAgendamento = $conn->insert_id;
            echo $idAgendamento;

            header('Location: /pi_gandara/pcp/agendamentoPlantacao.php');
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
} else if ($acao == "ALTERAR" && $idAgendamento) { {
        $sql = "UPDATE agendamento_plantacao SET 
       nome_plantio = ?, 
       area_plantio = ?, 
       data_plantio = ?, 
       data_colheita = ?, 
       espacamento_mudas = ?, 
       fruto = ?
       WHERE id_agendamento = ?;";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssssssi",
            $nomePlantio,
            $areaPlantio,
            $dataPlantio,
            $dataColheita,
            $espacoMuda,
            $fruto,
            $idAgendamento
        );
    }

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/pcp/agendamentoPlantacao.php');
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
} else if ($acao == "DELETAR" && $idAgendamento) {

    $idAgendamento = filter_var($idAgendamento, FILTER_VALIDATE_INT);
    if (!$idAgendamento) {
        retornarResposta("erro", "ID inválido para exclusão.");
    }
    // Neste bloco será excluido um registro que já existe no BD.

    $sql = "DELETE FROM agendamento_plantacao WHERE id_agendamento = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $idAgendamento);

        if ($stmt->execute()) {
            retornarResposta("sucesso", "Agendamneto excluída com sucesso!");
        } else {
            retornarResposta("erro", "Erro ao excluir agendamento: " . $stmt->error);
        }
    } else {
        retornarResposta("erro", "Erro na preparação da consulta: " . $conn->error);
    }
} else {
    retornarResposta("erro", "Ação inválida ou ID não fornecido.");
}

?>