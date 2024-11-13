<?php
require '../../utils/conexao.php';

// Verifica se veio um ID na URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $sql = "SELECT s.observacao, s.data_criacao, p.produto, p.descricao 
            FROM sol_compra s
            JOIN cad_produtos p ON s.id_produto = p.id
            WHERE s.id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data); // Retorna JSON com os campos
    } else {
        echo json_encode(['error' => 'Nenhum registro encontrado']);
    }
} else {
    echo json_encode(['error' => 'ID inválido']);
}
?>