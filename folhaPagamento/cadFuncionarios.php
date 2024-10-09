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

// Verifica de veio ID na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";

// Caso tenha umm ID, faz a busca do usuário no BD
if ($id) {

  $sql = 'SELECT * FROM usuarios WHERE id_usuario=?;';
  $stmt = $conn->prepare($sql);
  //troca o ? pelo ID que veio na URL
  $stmt->bind_param("i", $id);
  $stmt->execute();

  $dados = $stmt->get_result();

  // Verifica se encontrou o usuário ou se ele existe no BD
  if ($dados->num_rows > 0) {
    // Coloca os dados do usuário em uma variavel como array
    $user = $dados->fetch_assoc();
  } else {
    // Se não encontrou um usuário, retorna para a página enterior

?>
    <script>
      history.back();
    </script>

<?php
  }

  // Como converter data do JP para PT-BR
  // <?= date("d/m/Y", strtotime("datanascimento"))

}

?>
  </header>
  <main>

  <div class="container">
    <h2><?= ($id) ? "Alteração de Usuário" : "Cadastro de Funcionários"  ?></h2>
    <form action="/site-pi/bd/bd-usuario.php" method="POST">
      <input type="hidden" id="id_usuario" name="id_usuario" value="<?= isset($_GET['id']) ? ($_GET['id']) : null ?>">
      <input type="hidden" id="acao" name="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
      <div class="form-row">
        <div class="form-group col-md-9">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" class="form-control" name="nome" placeholder="nome" required value="<?= ($id) ? $user['nome'] : null ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="cpf">CPF:</label>
          <input type="text" class="form-control" name="cpf" id="cpf" placeholder="cpf" value="<?= ($id) ? $user['cpf'] : null ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="datanascimento">Data de Nascimento:</label> 
          <input type="date" class="form-control" id="datanascimento" name="datanascimento" placeholder="data de nascimento" required value="<?= ($id) ? $user['datanascimento'] : null ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@email.com" required value="<?= ($id) ? $user['email'] : null ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="telefone">Telefone residencial:</label>
          <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(14)-99999-9999" required value="<?= ($id) ? $user['telefone'] : null ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="telefone">Telefone celular:</label>
          <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(14)-99999-9999" required value="<?= ($id) ? $user['telefone'] : null ?>">
        </div>
        <div class="form-group col-md-10">
          <label for="endereco">Endereço:</label>
          <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Av Vinicius de Morais, 25" value="<?= ($id) ? $user['endereco'] : null ?>">
        </div>
        <div class="form-group col-md-2">
          <label for="numerocasa">Número da residência:</label>
          <input type="text" class="form-control" name="numerocasa" id="numerocasa" placeholder="número" value="<?= ($id) ? $user['numerocasa'] : null ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="cidade">Cidade:</label>
          <input type="text" class="form-control" name="cidade" id="cidade" placeholder="cidade" value="<?= ($id) ? $user['cidade'] : null ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="cep">Cep:</label>
          <input type="text" class="form-control" name="cep" id="cep" placeholder="cep" value="<?= ($id) ? $user['cep'] : null ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="estadocivil">Gênero:</label>
          <select type="text" id="genero" name="genero" class="form-control" required value="<?= ($id) ? $user['genero'] : null ?>">
            <option selected hidden>Escolha...</option>
            <option  value="">Selecione..</option>
            <option <?= isset($_GET['id']) && ($user['genero'] =="1") ? "selected" : null ?> value="1">Masculino</option>
            <option <?= isset($_GET['id']) && ($user['genero'] =="2") ? "selected" : null ?> value="2">Feminino</option>
            <option <?= isset($_GET['id']) && ($user['genero'] =="3") ? "selected" : null ?> value="3">Bicha</option>
          </select>
      </div>
        <div class="form-group col-md-3">
          <label for="estadocivil">Estado Civil:</label>
          <select type="text" id="estadocivil" name="estadocivil" class="form-control" required value="<?= ($id) ? $user['estadocivil'] : null ?>">
            <option selected hidden>Escolha...</option>
            <option  value="">Selecione..</option>
            <option <?= isset($_GET['id']) && ($user['estadocivil'] =="1") ? "selected" : null ?> value="1">Solteiro</option>
            <option <?= isset($_GET['id']) && ($user['estadocivil'] =="2") ? "selected" : null ?> value="2">Casado</option>
            <option <?= isset($_GET['id']) && ($user['estadocivil'] =="3") ? "selected" : null ?> value="3">União Estável</option>
            <option <?= isset($_GET['id']) && ($user['estadocivil'] =="3") ? "selected" : null ?> value="3">Amasiado</option>
            <option <?= isset($_GET['id']) && ($user['estadocivil'] =="4") ? "selected" : null ?> value="4">Separado</option>
            <option <?= isset($_GET['id']) && ($user['estadocivil'] =="5") ? "selected" : null ?> value="5">Divorciado</option>
          </select>
      </div>
        <div class="form-group col-md-3">
          <label for="estado">Estado:</label>
          <select type="text" id="estado" name="estado" class="form-control" required value="<?= ($id) ? $user['estado'] : null ?>">
            <option selected hidden>Escolha...</option>
            <option  value="">Selecione..</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="AC") ? "selected" : null ?> value="AC">Acre</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="AL") ? "selected" : null ?> value="AL">Alagoas</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="AP") ? "selected" : null ?> value="AP">Amapá</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="AM") ? "selected" : null ?> value="AM">Amazonas</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="BA") ? "selected" : null ?> value="BA">Bahia</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="CE") ? "selected" : null ?> value="CE">Ceará</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="DF") ? "selected" : null ?> value="DF">Distrito Federal</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="ES") ? "selected" : null ?> value="ES">Espírito Santo</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="GO") ? "selected" : null ?> value="GO">Goiás</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="MA") ? "selected" : null ?> value="MA">Maranhão</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="MT") ? "selected" : null ?> value="MT">Mato Grosso</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="MS") ? "selected" : null ?> value="MS">Mato Grosso do Sul</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="MG") ? "selected" : null ?> value="MG">Minas Gerais</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="PA") ? "selected" : null ?> value="PA">Pará</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="PB") ? "selected" : null ?> value="PB">Paraíba</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="PR") ? "selected" : null ?> value="PR">Paraná</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="PE") ? "selected" : null ?> value="PE">Pernambuco</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="PI") ? "selected" : null ?> value="PI">Piauí</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="RJ") ? "selected" : null ?> value="RJ">Rio de Janeiro</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="RN") ? "selected" : null ?> value="RN">Rio Grande do Norte</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="RS") ? "selected" : null ?> value="RS">Rio Grande do Sul</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="RO") ? "selected" : null ?> value="RO">Rondônia</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="RR") ? "selected" : null ?> value="RR">Roraima</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="SC") ? "selected" : null ?> value="SC">Santa Catarina</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="SP") ? "selected" : null ?> value="SP">São Paulo</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="SE") ? "selected" : null ?> value="SE">Sergipe</option>
            <option <?= isset($_GET['id']) && ($user['estado'] =="TO") ? "selected" : null ?> value="TO">Tocantins</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="cargo">Cargo:</label>
          <select type="text" id="cargo" name="cargo" class="form-control" required value="<?= ($id) ? $user['cargo'] : null ?>">
            <option selected hidden>Escolha...</option>
            <option  value="">Selecione..</option>
            <option <?= isset($_GET['id']) && ($user['cargo'] =="1") ? "selected" : null ?> value="1">cargo 1</option>
            <option <?= isset($_GET['id']) && ($user['cargo'] =="2") ? "selected" : null ?> value="2">cargo 2</option>
            <option <?= isset($_GET['id']) && ($user['cargo'] =="3") ? "selected" : null ?> value="3">cargo 3</option>
            <option <?= isset($_GET['id']) && ($user['cargo'] =="4") ? "selected" : null ?> value="4">cargo 4</option>
            <option <?= isset($_GET['id']) && ($user['cargo'] =="5") ? "selected" : null ?> value="5">cargo 5</option>
            <option <?= isset($_GET['id']) && ($user['cargo'] =="6") ? "selected" : null ?> value="6">cargo 6</option>
            <option <?= isset($_GET['id']) && ($user['cargo'] =="7") ? "selected" : null ?> value="7">cargo 7</option>
          </select>
      </div>
      <div class="form-group col-md-3">
          <label for="setor">Setor:</label>
          <select type="text" id="setor" name="setor" class="form-control" required value="<?= ($id) ? $user['setor'] : null ?>">
            <option selected hidden>Escolha...</option>
            <option  value="">Selecione..</option>
            <option <?= isset($_GET['id']) && ($user['setor'] =="1") ? "selected" : null ?> value="1">setor 1</option>
            <option <?= isset($_GET['id']) && ($user['setor'] =="2") ? "selected" : null ?> value="2">setor 2</option>
            <option <?= isset($_GET['id']) && ($user['setor'] =="3") ? "selected" : null ?> value="3">setor 3</option>
            <option <?= isset($_GET['id']) && ($user['setor'] =="4") ? "selected" : null ?> value="4">setor 4</option>
            <option <?= isset($_GET['id']) && ($user['setor'] =="5") ? "selected" : null ?> value="5">setor 5</option>
            <option <?= isset($_GET['id']) && ($user['setor'] =="6") ? "selected" : null ?> value="6">setor 6</option>
            <option <?= isset($_GET['id']) && ($user['setor'] =="7") ? "selected" : null ?> value="7">setor 7</option>
          </select>
      </div>
      <div class="form-group col-md-3">
          <label for="datanascimento">Data de Admissão:</label> 
          <input type="date" class="form-control" id="datanascimento" name="datanascimento" placeholder="data de nascimento" required value="<?= ($id) ? $user['datanascimento'] : null ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="datanascimento">Data de Demissão:</label> 
          <input type="date" class="form-control" id="datanascimento" name="datanascimento" placeholder="data de nascimento" required value="<?= ($id) ? $user['datanascimento'] : null ?>">
        </div>
      <div class="form-group col-md-3">
          <label for="salariobruto">Salário bruto:</label>
          <input type="text" class="form-control" name="salariobruto" id="salariobruto" placeholder="salário bruto" value="<?= ($id) ? $user['salariobruto'] : null ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="setor">Método de pagamento:</label>
          <select type="text" id="metodo" name="metodo" class="form-control" required value="<?= ($id) ? $user['metodo'] : null ?>">
            <option selected hidden>Escolha...</option>
            <option  value="">Selecione..</option>
            <option <?= isset($_GET['id']) && ($user['metodo'] =="Dinheiro") ? "selected" : null ?> value="1">Dinheiro</option>
            <option <?= isset($_GET['id']) && ($user['metodo'] =="Pix") ? "selected" : null ?> value="2">Pix</option>
            <option <?= isset($_GET['id']) && ($user['metodo'] =="Cheque") ? "selected" : null ?> value="3">Cheque</option>
          </select>
      </div>
      <br>
      <div class="container text-center">
        <button type="submit" class="btn <?= $cor ?> align-content-center">Enviar</button>
      </div>
      <br>
    </form>
  </div>

  <script src="/plugins/jquery/jquery.min.js"></script>
  <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="/dist/js/adminlte.min.js"></script>




  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>