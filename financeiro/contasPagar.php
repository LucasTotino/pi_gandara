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
  <title>Contas a Pagar</title>
</head>

<body>
  <header>
    <?php include_once('../utils/menu.php'); ?>
  </header>

  <main class="container">

    <h1 class="mb-4 text-center">Contas a Pagar</h1>

    <div class="row mb-4">
      <div class="col-md-4">
        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#novoPagamentoModal">
          <i class="fas fa-plus-circle mr-2"></i>Novo Pagamento
        </button>
      </div>
      <div class="col-md-4">
        <button class="btn btn-info btn-block" data-toggle="modal" data-target="#verFaturasModal">
          <i class="fas fa-file-invoice mr-2"></i>Ver Faturas
        </button>
      </div>
      <div class="col-md-4">
        <button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#historicoModal">
          <i class="fas fa-history mr-2"></i>Histórico de Pagamento
        </button>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Contas a Pagar</h5>
        <div class="table-responsive">
<<<<<<< HEAD
          <table style="text-align:center;" class="table table-striped table-hover">
=======
          <table class="table table-striped table-hover">
>>>>>>> 78db1f9ed088c79be38694425d220a1f99691f16
            <thead>
              <tr>
                <th>Número da Fatura</th>
                <th>Data da Fatura</th>
                <th>Data Vencimento</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody id="contasPagarList">
              <!-- Dados serão carregados via JavaScript -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <!-- Modal para Novo Pagamento -->
  <div class="modal fade" id="novoPagamentoModal" tabindex="-1" role="dialog" aria-labelledby="novoPagamentoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="novoPagamentoModalLabel">Novo Pagamento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="novoPagamentoForm">
            <div class="form-group">
              <label for="numeroFatura">Número da Fatura</label>
              <input type="text" class="form-control" id="numeroFatura" required>
            </div>
            <div class="form-group">
              <label for="dataVencimento">Data de Vencimento</label>
              <input type="date" class="form-control" id="dataVencimento" required>
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
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      // Função para carregar as contas a pagar
      function carregarContasPagar() {
        // Simular dados (substitua por uma chamada AJAX real)
        const contas = [{
            numero: "001",
            dataFatura: "2023-05-01",
            dataVencimento: "2023-05-15",
            valor: 1000.00,
            status: "Pendente"
          },
          {
            numero: "002",
            dataFatura: "2023-05-02",
            dataVencimento: "2023-05-16",
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
                            <td>${conta.dataVencimento}</td>
                            <td>R$ ${conta.valor.toFixed(2)}</td>
                            <td>${conta.status}</td>
                            <td>
<<<<<<< HEAD
                            <button class="btn btn-sm btn-success">Extrair relatório</button>
=======
                                <button class="btn btn-sm btn-info">Editar</button>
                                <button class="btn btn-sm btn-danger">Excluir</button>
>>>>>>> 78db1f9ed088c79be38694425d220a1f99691f16
                            </td>
                        </tr>
                    `;
        });

        $('#contasPagarList').html(html);
      }

      // Carregar contas a pagar ao iniciar a página
      carregarContasPagar();

      // Lidar com o envio do formulário de novo pagamento
      $('#novoPagamentoForm').submit(function(e) {
        e.preventDefault();
        // Aqui você faria uma chamada AJAX para salvar o novo pagamento
        alert('Novo pagamento adicionado com sucesso!');
        $('#novoPagamentoModal').modal('hide');
        carregarContasPagar(); // Recarregar a lista
      });
    });
  </script>

  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>