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

$stmt = $conn->prepare($sql);

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

<<<<<<< HEAD
    <br>

    <div class="d-flex justify-content-center">
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar conta...">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>

    <br><br>

=======
    <div class="row mb-4">
      <div class="col-md-4">
        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#novoRecebimentoModal">
          <i class="fas fa-plus-circle mr-2"></i>Novo Recebimento
        </button>
      </div>
      <div class="col-md-4">
        <button class="btn btn-info btn-block" data-toggle="modal" data-target="#verFaturasModal">
          <i class="fas fa-file-invoice mr-2"></i>Ver Faturas
        </button>
      </div>
      <div class="col-md-4">
        <button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#historicoModal">
          <i class="fas fa-history mr-2"></i>Histórico de Recebimento
        </button>
      </div>
    </div>

>>>>>>> 78db1f9ed088c79be38694425d220a1f99691f16
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Contas a Receber</h5>
        <div class="table-responsive">
<<<<<<< HEAD
          <table style="text-align:center;" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Número do Pedido</th>
                <th>Nome do Cliente</th>
                <th>Data da Venda</th>
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
                <td><?= $linha['id'] ?></td>
                <td><?= $linha['nome'] ?></td>
                <td><?= $linha['data_venda'] ?></td>
                <td><?= $linha['id_produto'] ?></td>
                <td>R$: <?= number_format($linha['quantidade'] * $linha['valor'], 2, ',', '.') ?></td>
                <td><a href="gerarPDF.php" class="btn btn-primary">Gerar Relatório PDF</a></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
=======
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Número da Fatura</th>
                <th>Data da Fatura</th>
                <th>Data Recebimento</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody id="contasReceberList">
              <!-- Dados serão carregados via JavaScript -->
            </tbody>
>>>>>>> 78db1f9ed088c79be38694425d220a1f99691f16
          </table>
        </div>
      </div>
    </div>
<<<<<<< HEAD

    
  </main>

  


  <!-- Modal para Novo Recebimento 
=======
  </main>

  <!-- Modal para Novo Recebimento -->
>>>>>>> 78db1f9ed088c79be38694425d220a1f99691f16
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
<<<<<<< HEAD
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
=======
              <label for="numeroFatura">Número da Fatura</label>
              <input type="text" class="form-control" id="numeroFatura" required>
            </div>
            <div class="form-group">
              <label for="dataRecebimento">Data de Recebimento</label>
              <input type="date" class="form-control" id="dataRecebimento" required>
            </div>
            <div class="form-group">
>>>>>>> 78db1f9ed088c79be38694425d220a1f99691f16
              <label for="valor">Valor</label>
              <input type="number" class="form-control" id="valor" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </form>
        </div>
      </div>
    </div>
<<<<<<< HEAD
  </div> -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
=======
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      // Função para carregar as contas a receber
      function carregarContasReceber() {
        // Simular dados (substitua por uma chamada AJAX real)
        const contas = [{
            numero: "001",
            dataFatura: "2023-05-01",
            dataRecebimento: "2023-05-15",
            valor: 1000.00,
            status: "Pendente"
          },
          {
            numero: "002",
            dataFatura: "2023-05-02",
            dataRecebimento: "2023-05-16",
            valor: 1500.00,
            status: "Pago"
          },
          // Adicione mais itens conforme necessário
        ];

        let html = '';
        contas.forEach(conta => {
          html += `
                        <tr>
                            <td>${conta.numero}</td>
                            <td>${conta.dataFatura}</td>
                            <td>${conta.dataRecebimento}</td>
                            <td>R$ ${conta.valor.toFixed(2)}</td>
                            <td>${conta.status}</td>
                            <td>
                                <button class="btn btn-sm btn-info">Editar</button>
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </td>
                        </tr>
                    `;
        });

        $('#contasReceberList').html(html);
      }

      // Carregar contas a receber ao iniciar a página
      carregarContasReceber();

      // Lidar com o envio do formulário de novo recebimento
      $('#novoRecebimentoForm').submit(function(e) {
        e.preventDefault();
        // Aqui você faria uma chamada AJAX para salvar o novo recebimento
        alert('Novo recebimento adicionado com sucesso!');
        $('#novoRecebimentoModal').modal('hide');
        carregarContasReceber(); // Recarregar a lista
      });
    });
  </script>

>>>>>>> 78db1f9ed088c79be38694425d220a1f99691f16
  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>