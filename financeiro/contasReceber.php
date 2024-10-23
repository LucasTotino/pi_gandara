<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <title>Razão Geral</title>
  

</head>

<body>  <!-- VERIFICAR FOTO  DO LIVRO  FINANCEIRO DO GANDARA -->
<header>
        <?php
            include_once('../utils/menu.php');
        ?>
  </header>

    <div class="container">

    <div class="container">
        <h1>Contas a Receber</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Número da Conta</th>
                    <th>Data de Vencimento</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="tabela-contas">
                <!-- Aqui serão exibidas as contas a receber -->
            </tbody>
        </table>
        <form id="form-conta">
            <div class="form-group">
                <label for="numero-conta">Número da Conta</label>
                <input type="text" class="form-control" id="numero-conta" required>
            </div>
            <div class="form-group">
                <label for="data-vencimento">Data de Vencimento</label>
                <input type="date" class="form-control" id="data-vencimento" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" id="valor" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Conta</button>
        </form>
        <button class="btn btn-secondary" id="gerar-relatorio">Gerar Relatório</button>
    </div>

    </div>
  
 


  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>