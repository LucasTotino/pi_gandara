<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  
  <title>Cadastro de funcionários</title>
</head>

<body>
<header>
<?php

include_once('../utils/menu.php');

?>
  </header>
  <main>

  <div class="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Id:</th>
          <th scope="col">Nome:</th>
          <th scope="col">CPF:</th>
          <th scope="col">Email:</th>
          <th scope="col">Telefone:</th>
          <th scope="col">Endereço:</th>
          <th scope="col">n°:</th>
          <th scope="col">Cidade:</th>
          <th scope="col">Estado:</th>
          <th scope="col">Cargo:</th>,
          <th scope="col">Salário:</th>
          <th scope="col">INSS:</th>
          <th scope="col">IRPF:</th>
          <th scope="col">FGTS:</th>
          <th scope="col">Adicional:</th>
          <th scope="col">Férias:</th>
        </tr>
      </thead>
    </table>
  </div>

  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="../dist/js/adminlte.min.js"></script>


  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>