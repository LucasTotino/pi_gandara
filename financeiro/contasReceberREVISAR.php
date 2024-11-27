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
        <div class="row p-3 justify-content-center d-flex align-items-center">
            <a type="button" style="text-align: left;" class="col-1 btn btn-primary justify-content-center d-flex" href="/pi_gandara/financeiro/">Voltar</a>
            <h1 style="text-align: center;" class="col-11 display-4">Contas a Receber</h1>
        </div>

        <div class="container">

            <div class="mb-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addAccountModal">Adicionar Conta</button>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Valor</th>
                        <th>Data de Vencimento</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Cliente A</td>
                        <td>R$ 1.000,00</td>
                        <td>2023-10-15</td>
                        <td>Pendente</td>
                        <td>
                            <button class="btn btn-success btn-sm">Pagar</button>
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Cliente B</td>
                        <td>R$ 500,00</td>
                        <td>2023-11-01</td>
                        <td>Pendente</td>
                        <td>
                            <button class="btn btn-success btn-sm">Pagar</button>
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </td>
                    </tr>
                    <!-- Adicione mais contas aqui -->
                </tbody>
            </table>
        </div>

        <!-- Modal para Adicionar Conta -->
        <div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAccountModalLabel">Adicionar Conta a Receber</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="cliente">Cliente</label>
                                <input type="text" class="form-control" id="cliente" placeholder="Nome do Cliente" required>
                            </div>
                            <div class="form-group">
                                <label for="valor">Valor</label>
                                <input type="text" class="form-control" id="valor" placeholder="Valor" required>
                            </div>
                            <div class="form-group">
                                <label for="dataVencimento">Data de Vencimento</label>
                                <input type="date" class="form-control" id="dataVencimento" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>