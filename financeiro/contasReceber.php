<?php
require '../utils/conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if ($id) {
  $sql = "SELECT * FROM cad_venda WHERE id=?;";
  $stmt = $conn->prepare($sql);


  $stmt->bind_param("i", $id);
  $stmt->execute();

  $dados = $stmt->get_result();

  // Verifica se encontrou o usuario ou se ele existe no BD
  if ($dados->num_rows > 0) {
    // Coloca os dados do usuário em uma variavel como array
    $user = $dados->fetch_assoc();
  } else {
    // Se não encontrou um usuario retorna para a página anterior.
?>

    <script>
      history.back();
    </script>
<?php
  }
}

$sql = "SELECT * FROM cad_venda;";

// Inicializa a variável de busca
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

// Prepara a consulta SQL
$sql = "SELECT * FROM cad_venda WHERE nomeCliente LIKE ? OR produto LIKE ?";


$stmt = $conn->prepare($sql);
$likeBuscar = "%" . $buscar . "%";
$stmt->bind_param("ss", $likeBuscar, $likeBuscar);
$stmt->execute();
$dados = $stmt->get_result();

// Prepara a consulta SQL da tabela de cliente
$sql_cliente = "SELECT id, nome, cpf_cnpj, tipo_cliente, email, celular, logradouro,
numero, complemento, bairro, cidade, estado, cep FROM cad_cliente"; // Ajuste os campos conforme necessário
$stmt_cliente = $conn->prepare($sql_cliente);
$stmt_cliente->execute();
$result_cliente = $stmt_cliente->get_result();

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/styleFinanceiro.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">

  <title>Contas a Receber</title>
</head>

<body>
  <header>
    <?php include_once('../utils/menu.php'); ?>
  </header>

  <main class="container">

    <h1 class="mb-4 text-center">Contas a Receber</h1>

    <br>

    <div class="d-flex justify-content-center">
      <form method="GET" action="contasReceber.php">
        <input class="form-control mr-sm-2" type="text" name="buscar" placeholder="Pesquisar conta...">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>

    <br><br>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Contas a Receber</h5>
        <div class="table-responsive">
          <table style="text-align:center;" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Número do Pedido</th>
                <th>Nome do Cliente</th>
                <th>Data da Venda</th>
                <th>Produto</th>
                <th>Valor da Venda</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($linha = $dados->fetch_assoc()) {
              ?>
                <tr>
                  <td><?= $linha['id'] ?></td>
                  <td><?= $linha['nomeCliente'] ?></td>
                  <td><?= date('d/m/Y', strtotime($linha['data_venda'])) ?></td>
                  <td><?= $linha['produto'] ?></td>
                  <td>R$: <?= number_format($linha['qtd'] * $linha['valor'], 2, ',', '.') ?></td>
                  <td><a href="gerarPDF.php" target="_blank" class="btn btn-success">Gerar Relatório</a></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>


  </main>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>