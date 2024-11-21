<?php
require '../utils/conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if ($id) {
  $sql = "SELECT * FROM cad_descontos WHERE id_promo=?;";
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
$sql = "SELECT * FROM cad_descontos;";

// Seleciona apenas os campos que serão usados.
$sql_eficiente = "SELECT id_promo, nomepromocao, iniciopromo, fimpromo, cod_produto, produto, porcen_promo
FROM cad_descontos;";

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
      <h3 class="text-center">Descontos</h3>
      <div class="card card-cds">
        <form class="mt-3 mb-3 ml-3 mr-3" id="userform" action="../comercial/bd/bd-caddescontos.php" method="POST">

          <input type="hidden" id="id_promo" name="id_promo" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
          <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">

          <div class="form-row">
            <div class="form-group col-md-6 text-white">
              <label class="text-dark" for="nomepromocao"><b>Nome da Promoção:</b></label>
              <input type="text" class="form-control" id="nomepromocao" name="nomepromocao"
              value="<?= ($id) ? $user['nomepromocao'] : null ?>">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="iniciopromo"><b>Inicio:</b></label>
              <input type="date" class="form-control" id="iniciopromo" name="iniciopromo"
              value="<?= ($id) ? $user['iniciopromo'] : null ?>">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="fimpromo"><b>Término:</b></label>
              <input type="date" class="form-control" id="fimpromo" name="fimpromo"
              value="<?= ($id) ? $user['fimpromo'] : null ?>">
            </div>
          </div> <!-- Cadastro de Promoções -->

          <hr>

          <div class="form-row">
            <div class="form-group col-md-1 text-white">
              <label class="text-dark" for="cod_produto"><b>Código:</b></label>
              <input type="text" class="form-control" id="cod_produto" name="cod_produto"
              value="<?= ($id) ? $user['cod_produto'] : null ?>">
            </div>
            <div class="form-group col-md-8 text-white">
              <label class="text-dark" for="produto"><b>Produto:</b></label>
              <input type="text" class="form-control" id="produto" name="produto"
              value="<?= ($id) ? $user['produto'] : null ?>">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="porcen_promo"><b>% Promoção:</b></label>
              <input type="tel" class="form-control" id="porcen_promo" name="porcen_promo"
              value="<?= ($id) ? $user['porcen_promo'] : null ?>">
            </div>
          </div> <!-- Cadastro de Promoções -->

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
              <th scope="col">Nome Promoção:</th>
              <th scope="col">Produto</th>
              <th scope="col">Inicio</th>
              <th scope="col">Término</th>
              <th scope="col">% Promoção</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Aqui adicionamos o laço de repetição que irá exibir uma linha da tabela para cada registro no BD.
            // Adiciona cada registro na variavel linha como um array. 
            while ($linha = $dados->fetch_assoc()) {

            ?>
              <tr>
                <td><?= $linha['nomepromocao'] ?></td>
                <td><?= $linha['produto'] ?></td>
                <td><?= $linha['iniciopromo'] ?></td>
                <td><?= $linha['fimpromo'] ?></td>
                <td><?= $linha['porcen_promo'] ?></td>
                <td>
                  <!-- Chamo a pagina de formulario e envio o id do usuario que sera alterado. -->
                  <a href="cadDescontos.php?id=<?= $linha['id_promo'] ?>" class="btn btn-warning">Editar</a>

                  <button class="btn btn-danger btn-excluir"
                    data-table="cad_descontos" data-id="<?= $linha['id_promo'] ?>"> Excluir</button>
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