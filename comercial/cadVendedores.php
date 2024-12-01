<?php
require '../utils/conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if ($id) {
  $sql = "SELECT * FROM cad_vendedores WHERE id_vendedor=?;";
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

// Prepara a consulta SQL.
$sql = "SELECT * FROM cad_vendedores;";

// Seleciona apenas os campos que serão usados.
$sql_eficiente = "SELECT id_vendedor, nomevendedor,	cpfcnpj,	datanasc,	cidade,	bairro,	rua, numero, complemento, cep,
porcentagem_comissao, desconto_possivel, tipo_vendedor, status_vendedor
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
      <h3 class="text-center">Cadastro de Vendedores</h3>
      <div class="card card-cds">
        <form class="mt-3 mb-3 ml-3 mr-3" id="userform" action="../comercial/bd/bd-cadvendedores.php" method="POST">

          <input type="hidden" id="id_vendedor" name="id_vendedor" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
          <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">

          <div class="form-row">
            <div class="form-group col-md-7 text-white">
              <label class="text-dark" for="nomevendedor"><b>Nome/Razão Social:</b></label>
              <input type="text" class="form-control" id="nomevendedor" name="nomevendedor"
                value="<?= ($id) ? $user['nomevendedor'] : null ?>">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="cpfcnpj"><b>CPF/CNPJ:</b></label>
              <input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj"
                value="<?= ($id) ? $user['cpfcnpj'] : null ?>">
            </div>
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for="datanasc"><b>Data de Nascimento:</b></label>
              <input type="date" class="form-control" id="datanasc" name="datanasc"
                value="<?= ($id) ? $user['datanasc'] : null ?>">
            </div>
          </div> <!-- Linha 1: Nome dos Vendedores, CPF/CNPJ e Data de Nascimento -->

          <div class="form-row">
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for="cidade"><b>Cidade:</b></label>
              <input type="text" class="form-control" id="cidade" name="cidade"
                value="<?= ($id) ? $user['cidade'] : null ?>">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="bairro"><b>Bairro:</b></label>
              <input type="text" class="form-control" id="bairro" name="bairro"
                value="<?= ($id) ? $user['bairro'] : null ?>">
            </div>
            <div class="form-group col-md-6 text-white">
              <label class="text-dark" for="rua"><b>Rua:</b></label>
              <input type="text" class="form-control" id="rua" name="rua"
                value="<?= ($id) ? $user['rua'] : null ?>">
            </div>
            <div class="form-group col-md-1 text-white">
              <label class="text-dark" for="numero"><b>Número:</b></label>
              <input type="text" class="form-control" id="numero" name="numero"
                value="<?= ($id) ? $user['numero'] : null ?>">
            </div>

          </div> <!-- Linha 2: Cidade,Bairro, Rua e Número -->

          <div class="form-row">
            <div class="form-group col-md-9 text-white">
              <label class="text-dark" for="complemento"><b>Complemento:</b></label>
              <input type="text" class="form-control" id="complemento" name="complemento"
                value="<?= ($id) ? $user['complemento'] : null ?>">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="cep"><b>CEP:</b></label>
              <input type="text" class="form-control" id="cep" name="cep"
                value="<?= ($id) ? $user['cep'] : null ?>">
            </div>
          </div> <!-- Linha 3: Complemento e CEP -->

          <hr>
          <h4 class="text-start">Outros:</h4>

          <div class="form-row">
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for="porcentagem_comissao"><b>% Comissão:</b></label>
              <input type="tel" class="form-control" id="porcentagem_comissao" name="porcentagem_comissao"
                value="<?= ($id) ? $user['porcentagem_comissao'] : null ?>">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="desconto_possivel"><b>% Máximo de desconto:</b></label>
              <input type="tel" class="form-control" id="desconto_possivel" name="desconto_possivel"
                value="<?= ($id) ? $user['desconto_possivel'] : null ?>">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="tipo_vendedor"><b>Tipo de Vendedor:</b></label>
              <select type="text" id="tipo_vendedor" name="tipo_vendedor" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option <?= isset($_GET['id']) && ($user['tipo_vendedor'] == "int") ? "selected" : null ?> value="int">Interno</option>
                <option <?= isset($_GET['id']) && ($user['tipo_vendedor'] == "ext") ? "selected" : null ?> value="ext">Externo</option>
              </select>
            </div>
            <div class="form-group col-md-4 text-white">
              <label class="text-dark" for="status_vendedor"><b>Status:</b></label>
              <select type="text" id="status_vendedor" name="status_vendedor" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option <?= isset($_GET['id']) && ($user['status_vendedor'] == "ativo") ? "selected" : null ?> value="ativo">Ativo</option>
                <option <?= isset($_GET['id']) && ($user['status_vendedor'] == "inativo") ? "selected" : null ?> value="inativo">Inativo</option>
              </select>
            </div>
          </div> <!-- Linha 4: Comissão, Máximo de desconto e Status -->

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
              <th scope="col">Nome</th>
              <th scope="col">CPF/CNPJ</th>
              <th scope="col">%Comissão</th>
              <th scope="col">Tipo</th>
              <th scope="col">Status</th>
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
                <td><?= $linha['nomevendedor'] ?></td>
                <td><?= $linha['cpfcnpj'] ?></td>
                <td><?= $linha['porcentagem_comissao'] ?></td>
                <td><?= $linha['tipo_vendedor'] ?></td>
                <td><?= $linha['status_vendedor'] ?></td>
                <td>
                  <!-- Chamo a pagina de formulario e envio o id do usuario que sera alterado. -->
                  <a href="cadVendedores.php?id=<?= $linha['id_vendedor'] ?>" class="btn btn-warning">Editar</a>

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