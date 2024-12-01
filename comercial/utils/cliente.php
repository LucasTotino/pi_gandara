<?php
require '../../utils/conexao.php';

// Receber o ID do cliente
$id_cliente = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_cliente) {
    // Consulta SQL para buscar as informações do cliente
    $sql = "SELECT * FROM cad_cliente 
            WHERE nome = ?";
    

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Dados não encontrados']);
    }
} else {
    echo json_encode(['error' => 'ID inválido']);
}
?>