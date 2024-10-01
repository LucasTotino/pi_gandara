<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title>Trabalho Gandara!</title>
</head>
<header>
<nav>
    <a href="/pi_gandara/index.php" title="Home">
      <span class="fa fa-bars" aria-hidden="true"></span>
      <span class="label">Menu</span>
    </a>
    <a href="/pi_gandara/estoque/index.php" title="Estoque">
      <span class="fa fa-solid fa-box"></span>
      <span class="label">Estoque</span>
    </a>
    <a href="/pi_gandara/compras/index.php" title="Compras" class="active">
      <span class="fa fa-money"></span>
      <span class="label">Compras</span>
    </a>
    <a href="/pi_gandara/pcp/index.php" title="PCP">
      <span class="fa fa-helmet-safety"></span>
      <span class="label">PCP</span>
    </a>
    <a href="/pi_gandara/financeiro/index.php" title="Financeiro">
      <span class="fa fa-solid fa-dollar-sign"></span>
      <span class="label">Financeiro</span>
    </a>
    <a href="/pi_gandara/folhaPagamento/index.php" title="Folha de Pagamento">
      <span class="fa fa-file-invoice-dollar"></span>
      <span class="label">Folha de Pagamento</span>
    </a>
    <a href="/pi_gandara/comercial/index.php" title="Comercial">
      <span class="fa fa-chart-line"></span>
      <span class="label">Comercial</span>
    </a>
  </nav>

</header>
<body>

<div class="container">
  <h4>Formulário para requisição de materiais onde será exibido o banco do estoque com uma box, onde os selecionados serão solicitados.</h4>
</div>

<script>

const masterCheckBox = document.querySelector('th input');
masterCheckBox.onchange = (event) =>
    checkBoxes.forEach(e =>  e.checked = event.target.checked);
</script>

<div class="container">
<table class="table table-striped">
  <tr>
    <th><input type="checkbox" id="allinputs" name="allinputs"></th>
    <th>ID</th><th>Nome</th><th>Idate</th>
  </tr>
  <tr>
    <td><input type="checkbox" id="input1" name="input1"></td>
    <td>1</td><td>João</td><td>23</td>
  </tr>
  <tr>
    <td><input type="checkbox" id="input2" name="input2"></td>
    <td>2</td><td>Maria</td><td>34</td>
  </tr>
  <tr>
    <td><input type="checkbox" id="input3" name="input3"></td>
    <td>3</td><td>José</td><td>45</td>
  </tr>
</table>
</div>

  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>