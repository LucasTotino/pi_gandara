<?php
require '../../utils/conexao.php';
// Verifica se veio um id na URL

$id = intval($_GET['id']);

// Consulta para buscar a descrição do produto
$sql = "SELECT descricao FROM cad_produtos WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['descricao'];
} else {
    echo "Descrição não encontrada.";
}

$conn->close();
?>
