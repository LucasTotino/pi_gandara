<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  
  <title>Folha de Pagamento</title>
</head>

<body>
<header>
<?php
            include_once('../utils/menu.php');
        ?>
  </header>
  <main>
  <div class="container">
    <form action="XXXXX" method="POST">
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputName">Nome:</label>
              <input type="text" id="inputName" class="form-control" placeholder="nome" required>
          </div>
          <div class="form-group col-md-6">
              <label for="inputSurname">Sobrenome:</label>
              <input type="text" class="form-control" id="inputSurname" placeholder="sobrenome" required>
          </div>
          <div class="form-group col-md-6">
              <label for="inputEmail4">Email:</label>
              <input type="email" class="form-control" id="inputEmail4" placeholder="exemplo@email.com" required>
          </div>
          <div class="form-group col-md-6">
              <label for="inputPassword4">Senha:</label>
              <input type="password" class="form-control" id="inputPassword4" placeholder="senha" required>
          </div>
      </div>
      <div class="form-group">
          <label for="inputAddress">Endereço:</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Av Vinicius de Morais, 25" required>
      </div>
      <div class="form-group">
          <label for="inputAddress2">Complemento:</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, casa, sítio...">
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputCity">Cidade:</label>
              <input type="text" class="form-control" id="inputCity" required>
          </div>
          <div class="form-group col-md-2">
              <label for="inputZip">Cep:</label>
              <input type="text" class="form-control" id="inputZip" required>
          </div>
          <div class="form-group col-md-4">
              <label for="inputState">Estado:</label>
              <select id="inputState" class="form-control" required>
                  <option selected hidden>Escolha...</option>
                  <option value="AC">Acre</option>
                  <option value="AL">Alagoas</option>
                  <option value="AP">Amapá</option>
                  <option value="AM">Amazonas</option>
                  <option value="BA">Bahia</option>
                  <option value="CE">Ceará</option>
                  <option value="DF">Distrito Federal</option>
                  <option value="ES">Espírito Santo</option>
                  <option value="GO">Goiás</option>
                  <option value="MA">Maranhão</option>
                  <option value="MT">Mato Grosso</option>
                  <option value="MS">Mato Grosso do Sul</option>
                  <option value="MG">Minas Gerais</option>
                  <option value="PA">Pará</option>
                  <option value="PB">Paraíba</option>
                  <option value="PR">Paraná</option>
                  <option value="PE">Pernambuco</option>
                  <option value="PI">Piauí</option>
                  <option value="RJ">Rio de Janeiro</option>
                  <option value="RN">Rio Grande do Norte</option>
                  <option value="RS">Rio Grande do Sul</option>
                  <option value="RO">Rondônia</option>
                  <option value="RR">Roraima</option>
                  <option value="SC">Santa Catarina</option>
                  <option value="SP">São Paulo</option>
                  <option value="SE">Sergipe</option>
                  <option value="TO">Tocantins</option>
              </select>
          </div>
      </div>
      <div class="container text-center">
        <button type="submit" class="btn btn-success align-content-center">Enviar</button>
      </div>
  </form>
  </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>




  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>
