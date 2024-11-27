<?php
require "../utils/conexao.php";

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

} elseif ($acao === "DELETAR" && $idMedicao) {
    // Exclui um registro existente
    $sql = "DELETE FROM medicao_producao WHERE id_medicao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idMedicao);

    try {
        if ($stmt->execute()) {
            echo json_encode(["status" => "sucesso", "message" => "Registro excluído com sucesso!"]);
        } else {
            echo json_encode(["status" => "erro", "message" => "Erro ao excluir: " . $stmt->error]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "erro", "message" => "Erro ao excluir: " . $e->getMessage()]);
    }

} else {
    // Redireciona se nenhuma ação válida for fornecida
    header("Location: /pi_gandara/pcp/medicaoProducao.php");
    exit;
}

// Fecha o statement e a conexão
if (isset($stmt)) {
    $stmt->close();
}
$conn->close();
?>
 