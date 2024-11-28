<?php
require "../utils/conexao.php";

// Função para retornar uma resposta em JSON
function retornarResposta($status, $mensagem) {
    echo json_encode(["status" => $status, "message" => $mensagem]);
    exit;

}
// Recupera os campos enviados pelo formulário
$nomePlantio = $_POST['id_nome_plantio'] ?? null;
$dataMedicao = $_POST['dataMedicao'] ?? null;
$diametroFruto = $_POST['diametroFruto'] ?? null;
$adubacao = $_POST['adubacao'] ?? null;
$praga = $_POST['praga'] ?? null;
$obsMedicao = $_POST['obsMedicao'] ?? null;
$acao = $_POST['acao'] ?? null;

// Recupera o ID da medição, necessário para alteração ou exclusão
$idMedicao = $_POST['id_medicao'] ?? null;

if ($acao === "INCLUIR") {
    // Insere um novo registro no banco de dados
    $sql = "INSERT INTO medicao_producao (id_nome_plantio, data_medicao, diametro_fruto, adubacao, praga, obs_medicao) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nomePlantio, $dataMedicao, $diametroFruto, $adubacao, $praga, $obsMedicao);

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/pcp/medicaoProducao.php');
            exit;
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
        ?>
        <script>history.back();</script>
        <?php
    }

} elseif ($acao === "ALTERAR" && $idMedicao) {
    // Atualiza um registro existente
    $sql = "UPDATE medicao_producao 
            SET id_nome_plantio = ?, data_medicao = ?, diametro_fruto = ?, adubacao = ?, praga = ?, obs_medicao = ? 
            WHERE id_medicao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nomePlantio, $dataMedicao, $diametroFruto, $adubacao, $praga, $obsMedicao, $idMedicao);

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/pcp/medicaoProducao.php');
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


    
}elseif ($acao === "DELETAR" && $idMedicao) {
    // Valida o ID
    $idMedicao = filter_var($idMedicao, FILTER_VALIDATE_INT);
    if (!$idMedicao) {
        retornarResposta("erro", "ID inválido para exclusão.");
    }

    // Executa a exclusão no banco de dados
    $sql = "DELETE FROM medicao_producao WHERE id_medicao = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $idMedicao);

        if ($stmt->execute()) {
            retornarResposta("sucesso", "Medição excluída com sucesso!");
        } else {
            retornarResposta("erro", "Erro ao excluir medição: " . $stmt->error);
        }
    } else {
        retornarResposta("erro", "Erro na preparação da consulta: " . $conn->error);
    }
} else {
    retornarResposta("erro", "Ação inválida ou ID não fornecido.");
}

?>
 