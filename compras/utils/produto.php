<?php
require '../../utils/conexao.php';
// Verifica se veio um id na URL

$id = intval($_GET['id']);

// Consulta para buscar a descrição do produto
$sql = "SELECT observacao FROM sol_compra WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['observacao'];
} else {
    echo "Observação não encontrada.";
}

$conn->close();


?>

