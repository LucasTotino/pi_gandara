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


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Holerite</title>
</head>

<body>
  <header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>
  <main>
    <?php

    // Aqui adicionamos o laço de repetição que ira exibir uma linha da tabela para cada registro no BD

    // Adiciona cada registro na variavel linha como um array.
    while ($linha = $dados->fetch_assoc()) {

    ?>
      <div class="container my-5">
        <div class="card shadow-sm">
          <div class="card-header text-center bg-success text-white">
            <h1 class="h4">Holerite</h1>
            <p class="mb-0">Mês: Novembro de 2024</p>
          </div>
          <div class="card-body">
            <!-- Dados do Funcionário -->
            <div class="mb-4">
              <h2 class="h6 border-bottom pb-2">Dados do Funcionário</h2>
              <p><strong>Nome: </strong><?= $linha['fpNome'] ?></p>
              <p><strong>CPF: </strong><?= $linha['fpCpf'] ?></p>
              <p><strong>Cargo: </strong><?= $linha['fpCargo'] ?></p>
            </div>

            <!-- Detalhamento -->
            <div>
              <h2 class="h6 border-bottom pb-2">Detalhamento</h2>
              <table class="table table-bordered table-striped">
                <thead class="table-light">
                  <tr>
                    <th>Descrição</th>
                    <th>Vencimentos (R$)</th>
                    <th>Descontos (R$)</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Salário Base</td>
                    <td>R$<?= $linha ['fpSalarioBruto'] ?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Vale Refeição</td>
                    <td><?php $valeRefeicao = 500.00?>R$500</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>INSS</td>
                    <td></td>
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

                        echo "<td>R$" . number_format($descontoINSS) . "</td>";

                        ?>
                  </tr>
                  <tr>
                    <td>IRRF</td>
                    <td></td>
                    <td>R$<?= $imposto = $salarioBruto * 0.075 ?></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Total</th>
                    <th>R$<?= $totalVencimentos = $valeRefeicao+$salarioBruto?></th>
                    <th>R$<?= $totalDescontos = $descontoINSS + $imposto ?></th>
                  </tr>
                  <tr class="table-secondary">
                    <th>Líquido</th>
                    <th colspan="2" class="text-center"><?= number_format(($totalVencimentos - $totalDescontos ) * 0.92, 2, ',', '.') ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
<script src="../js/script.js"></script>
<script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<scrip src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">



</html>