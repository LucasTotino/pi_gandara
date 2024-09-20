<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <title>Gerenciamento Bancário</title>
</head>

<body>
  <header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>


  <main>
    <div class="container">
      <div class="row p-3 justify-content-center d-flex align-items-center">
        <a type="button" style="text-align: left;" class="col-1 btn btn-primary justify-content-center d-flex" href="/pi_gandara/financeiro/">Voltar</a>
        <h1 style="text-align: center;" class="col-11 display-4">Gerenciamento Bancário</h1>
      </div>


      <div class="row p-3 justify-content-center d-flex align-items-center">
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contas Bancárias</h5>
              <ul class="list-group">
                <li class="list-group-item">
                  <span class="fa fa-bank" aria-hidden="true"></span>
                  <span>Conta Corrente - Banco do Brasil</span>
                  <span class="badge badge-primary">R$ 10.000,00</span>
                </li>
                <li class="list-group-item">
                  <span class="fa fa-bank" aria-hidden="true"></span>
                  <span>Conta Poupança - Caixa Econômica</span>
                  <span class="badge badge-primary">R$ 5.000,00</span>
                </li>
                <li class="list-group-item">
                  <span class="fa fa-bank" aria-hidden="true"></span>
                  <span>Conta Investimento - Banco Santander</span>
                  <span class="badge badge-primary">R$ 20.000,00</span>
                </li>
              </ul>

              <br>
              <a type="button" style="text-align: justify;" class="btn btn-primary justify-content-center d-flex" href="/pi_gandara/financeiro/novoBanco.php">Adicionar nova conta</a>

            </div>

          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Movimentações Bancárias</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Conta</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>2023-02-20</td>
                    <td>Depósito</td>
                    <td>R$ 1.000,00</td>
                    <td>Conta Corrente - Banco do Brasil</td>
                  </tr>
                  <tr>
                    <td>2023-02-19</td>
                    <td>Saque</td>
                    <td>R$ 500,00</td>
                    <td>Conta Poupança - Caixa Econômica</td>
                  </tr>
                  <tr>
                    <td>2023-02-18</td>
                    <td>Transferência</td>
                    <td>R$ 2.000,00</td>
                    <td>Conta Investimento - Banco Santander</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row p-3 justify-content-center d-flex align-items-center">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Relatórios Bancários</h5>
              <ul class="list-group">
                <li class="list-group-item">
                  <span class="fa fa-file" aria-hidden="true"></span>
                  <span>Relatório de Movimentações Bancárias</span>
                </li>
                <li class="list-group-item">
                  <span class="fa fa-file" aria-hidden="true"></span>
                  <span>Relatório de Saldo Bancário</span>
                </li>
                <li class="list-group-item">
                  <span class="fa fa-file" aria-hidden="true"></span>
                  <span>Relatório de Investimentos Bancários</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>




  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>