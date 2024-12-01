<?php
require '../../utils/conexao.php';


$id_venda = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_venda) {
    // Consulta SQL para buscar as informações da venda
    $sql = "SELECT * 
            FROM cad_vendas 
            WHERE id_venda = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_venda);
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