<?php
require '../utils/conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if ($id) {
  $sql = "SELECT * FROM cad_vendas WHERE id_venda=?;";
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



$sql = "SELECT * FROM cad_vendas;";

$stmt = $conn->prepare($sql);

$stmt->execute();

$dados = $stmt->get_result();

// Prepara a consulta SQL da tabela de cliente
$sql_cliente = "SELECT id, nome, cpf_cnpj, tipo_cliente, email, celular, logradouro,
numero, complemento, bairro, cidade, estado, cep FROM cad_cliente"; // Ajuste os campos conforme necessário
$stmt_cliente = $conn->prepare($sql_cliente);
$stmt_cliente->execute();
$result_cliente = $stmt_cliente->get_result();

// Prepara a consulta SQL da tabela de descontos
$sql_descontos = "SELECT id_promo, nomepromocao, iniciopromo, fimpromo, cod_produto, produto, porcen_promo FROM cad_descontos"; // Ajuste os campos conforme necessário
$stmt_descontos = $conn->prepare($sql_descontos);
$stmt_descontos->execute();
$result_descontos = $stmt_descontos->get_result();

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="styles.css">
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
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar conta...">
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
                <th>Número Pedido</th>
                <th>Nome do Cliente</th>
                <th>Data Venda</th>
                <th>Produto</th>
                <th>Valor da Venda</th> <!-- CRIAR NOVO BANCO DE DADOS RECEBENDO INFORMAÇÕES DO cadVendas.php -->
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
            <?php
            // Aqui adicionamos o laço de repetição que irá exibir uma linha da tabela para cada registro no BD.
            // Adiciona cada registro na variavel linha como um array. 
            while ($linha = $dados->fetch_assoc()) {

            ?>
              <tr>
                <td><?= $linha['id_venda'] ?></td>
                <td><?= $linha['nome'] ?></td>
                <td><?= $linha['dia_venda'] ?></td>
                <td><?= $linha['produto'] ?></td>
                <td>R$: <?= number_format($linha['quantidade'] * $linha['valor'], 2, ',', '.') ?></td>
                <td><a href="gerarPDF.php" class="btn btn-primary">Gerar Relatório PDF</a></td>
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

  


  <!-- Modal para Novo Recebimento 
  <div class="modal fade" id="novoRecebimentoModal" tabindex="-1" role="dialog" aria-labelledby="novoRecebimentoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="novoRecebimentoModalLabel">Novo Recebimento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="novoPagamentoForm">
            <div class="form-group">
              <label for="numeroFatura">Número do Pedido</label>
              <input type="text" class="form-control" id="numeroFatura" required>
            </div>
            <div class="form-group">
              <label for="nomeCliente">Nome do Cliente</label>
              <input type="text" class="form-control" id="nomeCliente" required>
            </div>
            <div class="form-group">
              <label for="dataVenda">Data da Venda</label>
              <input type="date" class="form-control" id="dataVenda" required>
            </div>
            <div class="form-group">
              <label for="valor">Valor</label>
              <input type="number" class="form-control" id="valor" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </form>
        </div>
      </div>
    </div>
  </div> -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>