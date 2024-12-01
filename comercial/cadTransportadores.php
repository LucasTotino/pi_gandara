<?php
require '../utils/conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if ($id) {
  $sql = "SELECT * FROM cad_transportadores WHERE id_transportador=?;";
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

$sql = "SELECT * FROM cad_transportadores;";

// Seleciona apenas os campos que serão usados.
$sql_eficiente = "SELECT id_transportador, nometransportador, cpfcnpj_transportador, modeloveiculo, status_transportador,
estado, volume, placa, rntrc
FROM cad_vendedores;";

// Envia o SQL para o prepare statement:
$stmt = $conn->prepare($sql);

// Executa a consulta SQL
$stmt->execute();

// Pega o resultado e adiciona em uma variavel 
$dados = $stmt->get_result();  // Exclusivamente com SQL generico.

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">

  <title>Comercial e Faturamento</title>
</head>


<body>
  <header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>
  <main>
    <h1 class="text-center">COMERCIAL E FATURAMENTO</h1>
    <div class="container">
      <h3 class="text-center">Cadastro de Transportadora</h3>
      <div class="card card-cds">
        <form class="mt-3 mb-3 ml-3 mr-3" id="userform" action="../comercial/bd/bd-cadtransportadores.php" method="POST">

          <input type="hidden" id="id_transportador" name="id_transportador" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
          <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">

          <div class="form-row">
            <div class="form-group col-md-8 text-white">
              <label class="text-dark" for="nometransportador"><b>Nome/Razão Social:</b></label>
              <input type="text" class="form-control" id="nometransportador" name="nometransportador"
                value="<?= ($id) ? $user['nometransportador'] : null ?>">
            </div>
            <div class="form-group col-md-4 text-white">
              <label class="text-dark" for="cpfcnpj_transportador"><b>CPF/CNPJ:</b></label>
              <input type="text" class="form-control" id="cpfcnpj_transportador" name="cpfcnpj_transportador"
                value="<?= ($id) ? $user['cpfcnpj_transportador'] : null ?>">
            </div>
          </div> <!-- Linha 1: Nome dos Distribuidores e CPF/CNPJ -->

          <hr>
          <h4 class="text-start">Complemento de Cadastro:</h4>

          <div class="form-row">
            <div class="form-group col-md-8 text-white">
              <label class="text-dark" for="modeloveiculo"><b>Modelo do Veículo:</b></label>
              <input type="text" class="form-control" id="modeloveiculo" name="modeloveiculo"
                value="<?= ($id) ? $user['modeloveiculo'] : null ?>">
            </div>
            <div class="form-group col-md-4 text-white">
              <label class="text-dark" for="status_transportador"><b>Status:</b></label>
              <select type="text" id="status_transportador" name="status_transportador" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
              </select>
            </div>
          </div> <!-- Linha 4: Comissão, Máximo de desconto e Status -->

          <div class="form-row">
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="estado"><b>Estado:</b></label>
              <select id="estado" name="estado" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "AC") ? "selected" : null ?> value="AC">Acre</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "AL") ? "selected" : null ?> value="AL">Alagoas</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "AP") ? "selected" : null ?> value="AP">Amapá</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "AM") ? "selected" : null ?> value="AM">Amazonas</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "BA") ? "selected" : null ?> value="BA">Bahia</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "CE") ? "selected" : null ?> value="CE">Ceará</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "DF") ? "selected" : null ?> value="DF">Distrito Federal</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "ES") ? "selected" : null ?> value="ES">Espírito Santo</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "GO") ? "selected" : null ?> value="GO">Goiás</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "MA") ? "selected" : null ?> value="MA">Maranhão</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "MT") ? "selected" : null ?> value="MT">Mato Grosso</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "MS") ? "selected" : null ?> value="MS">Mato Grosso do Sul</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "MG") ? "selected" : null ?> value="MG">Minas Gerais</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "PA") ? "selected" : null ?> value="PA">Pará</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "PB") ? "selected" : null ?> value="PB">Paraíba</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "PR") ? "selected" : null ?> value="PR">Paraná</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "PE") ? "selected" : null ?> value="PE">Pernambuco</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "PI") ? "selected" : null ?> value="PI">Piauí</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "RJ") ? "selected" : null ?> value="RJ">Rio de Janeiro</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "RM") ? "selected" : null ?> value="RN">Rio Grande do Norte</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "RS") ? "selected" : null ?> value="RS">Rio Grande do Sul</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "RO") ? "selected" : null ?> value="RO">Rondônia</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "RR") ? "selected" : null ?> value="RR">Roraima</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "SC") ? "selected" : null ?> value="SC">Santa Catarina</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "SP") ? "selected" : null ?> value="SP">São Paulo</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "SE") ? "selected" : null ?> value="SE">Sergipe</option>
                <option <?= isset($_GET['id']) && ($user['estado'] == "TO") ? "selected" : null ?> value="TO">Tocantins</option>
              </select>
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="volume"><b>Volume:</b></label>
              <input type="text" class="form-control" id="volume" name="volume"
                value="<?= ($id) ? $user['volume'] : null ?>">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="placa"><b>Placa:</b></label>
              <input type="text" class="form-control" id="placa" name="placa"
                value="<?= ($id) ? $user['placa'] : null ?>">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="rntrc"><b>RNTRC:</b></label>
              <input type="text" class="form-control" id="rntrc" name="rntrc"
                value="<?= ($id) ? $user['rntrc'] : null ?>">
            </div>
          </div>

          <hr>

          <div class="form-row mt-3">
            <div class="col-md-4 text-left">
              <a class="btn btn-warning" href="../comercial/index.php">Voltar</a>
            </div>
            <div class="col-md-4 text-center">
              <button type="reset" class="btn btn-outline-secondary">Limpar</button>
            </div>
            <div class="col-md-4 text-right">
              <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
          </div> <!-- BOTÕES -->

        </form> <!-- End Form -->
      </div>

      <hr>

      <div class="card">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome/Razão Social</th>
              <th scope="col">CPF/CNPJ</th>
              <th scope="col">Veiculo</th>
              <th scope="col">Placa</th>
              <th scope="col">Estado</th>
              <th scope="col">Volume</th>
              <th scope="col">Editar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Aqui adicionamos o laço de repetição que irá exibir uma linha da tabela para cada registro no BD.
            // Adiciona cada registro na variavel linha como um array. 
            while ($linha = $dados->fetch_assoc()) {

            ?>
              <tr>
                <td><?= $linha['nometransportador'] ?></td>
                <td><?= $linha['cpfcnpj_transportador'] ?></td>
                <td><?= $linha['modeloveiculo'] ?></td>
                <td><?= $linha['placa'] ?></td>
                <td><?= $linha['estado'] ?></td>
                <td><?= $linha['volume'] ?></td>
                <td>
                  <!-- Chamo a pagina de formulario e envio o id do usuario que sera alterado. -->
                  <a href="cadTransportadores.php?id=<?= $linha['id_transportador'] ?>" class="btn btn-warning">Editar</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>


  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</body>

</html>