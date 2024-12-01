<?php

require '../utils/conexao.php';


// Prepara a consulta SQL 
$sql = "SELECT * FROM cadastro_funcionarios;";

// Seleciona apenas os campos que serão usados
$select_eficiente = "SELECT idFuncionario, fpNome, fpCpf, fpCargo, fpSalarioBruto FROM cadastro_funcionarios;";

// Envia o SQL para o Prepare Statement:
$stmt = $conn->prepare($sql);

// Executa a consulta SQL
$stmt->execute();

// Pega o resultado e adiciona em uma variavel
$dados =  $stmt->get_result(); // Somente com SQL genérico

/*

Caso use o SQL eficiente:

Liga os resultados a variaveis para serem utilizadas no HTML
  $stmt->bind_result($id_usuario, $nome, $email, $cpf, $celular, $niveldeacesso);

*/

$nivel = array(
  'Administrador', // Posição 0
  'Usuário' // Posição 1
);

$corNivel = array(
  'badge-danger', // Posição 0
  'badge-primary' // Posição 1
);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Funcionários</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


  <!-- Admin Lte-->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Admin Lte-->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="CSS/style.css">

</head>

<body>

  <div class="container mt-5">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Id:</th>
          <th scope="col">Nome:</th>
          <th scope="col">CPF:</th>
          <th scope="col">Cargo:</th>
          <th scope="col">Salário Bruto:</th>
          <th scope="col">FGTS:</th>
          <th scope="col">INSS:</th>
          <th scope="col">Valor a receber:</th>
          <th scope="col">Ações:</th>
        </tr>
      </thead>
      <tbody>

        <?php

        // Aqui adicionamos o laço de repetição que ira exibir uma linha da tabela para cada registro no BD

        // Adiciona cada registro na variavel linha como um array.
        while ($linha = $dados->fetch_assoc()) {

        ?>

        <tr>
          <th scope="row">
            <?= $linha['idFuncionario'] ?>
          </th>
          <td>
            <?= $linha['fpNome'] ?>
          </td>
          <td>
            <?= $linha['fpCpf'] ?>
          </td>
          <td>
            <?= $linha['fpCargo'] ?>
          </td>
          <td>R$
            <?= $linha['fpSalarioBruto'] ?>
          </td>
          <td>R$
            <?= $linha['fpSalarioBruto'] * 0.08 ?>
          </td>
          <?php

$salarioBruto = $linha['fpSalarioBruto'];
$aliquotaINSS = 0;

if ($salarioBruto <= 1412) {
    $aliquotaINSS = 7.5;
} elseif ($salarioBruto <= 2666.68) {
    $aliquotaINSS = 9;
} elseif ($salarioBruto <= 4000.03) {
    $aliquotaINSS = 12;
} else {
    $aliquotaINSS = 14;
}

$descontoINSS = $salarioBruto * ($aliquotaINSS / 100);

echo "<td>R$" . number_format($descontoINSS, 2, ',', '.') . "</td>";

?>

          <td>R$
            <?= number_format(($linha['fpSalarioBruto'] - $descontoINSS) * 0.92, 2, ',', '.') ?>
          </td>
          <td>
          <a href="holerite.php?id=<?= $linha['idFuncionario'] ?>" class="btn btn-primary">Ver Holerite</a>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="../dist/js/adminlte.min.js"></script>

</body>

</html>