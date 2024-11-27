<?php
require '../utils/conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if ($id) {
  $sql = "SELECT * FROM cad_vendas WHERE id_venda=?;";
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



$sql = "SELECT * FROM cad_vendas;";

$stmt = $conn->prepare($sql);

$stmt->execute();

$dados = $stmt->get_result();

// Prepara a consulta SQL da tabela de cliente
$sql_cliente = "SELECT id, nome, cpf_cnpj, tipo_cliente, email, celular, logradouro,
numero, complemento, bairro, cidade, estado, cep FROM cad_cliente"; // Ajuste os campos conforme necessário
$stmt_cliente = $conn->prepare($sql_cliente);
$stmt_cliente->execute();
$result_cliente = $stmt_cliente->get_result();

// Prepara a consulta SQL da tabela de descontos
$sql_descontos = "SELECT id_promo, nomepromocao, iniciopromo, fimpromo, cod_produto, produto, porcen_promo FROM cad_descontos"; // Ajuste os campos conforme necessário
$stmt_descontos = $conn->prepare($sql_descontos);
$stmt_descontos->execute();
$result_descontos = $stmt_descontos->get_result();

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
      <h3 class="text-center">Cadastro de Vendas</h3>
      <div class="card card-cds">
        <form class="mt-3 mb-3 ml-3 mr-3" id="userform" action="../comercial/bd/bd-cadvendas.php" method="POST">

          <input type="hidden" id="id_venda" name="id_venda" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
          <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">

          <div class="form-row">
            <div class="form-group col-sm-2">
              <label for="" class="font-weight-bold">Nº Pedido:</label>
              <input type="text" id="" name="" class="form-control" readonly
              value="<?= ($id) ? $user['id_venda'] : null ?>">
            </div>

            <div class="form-group col-md-8 text-white">
              <label class="text-dark" for="nome"><b>Nome/Razão Social Cliente:</b></label>
              <select id="nome" name="nome" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <?php
                while ($cliente = $result_cliente->fetch_assoc()) {
                  $selectP = ($id && $user['nome'] == $cliente['nome']) ? 'selected' : '';
                  echo "<option value='{$cliente['nome']}' $selectP>{$cliente['nome']}</option>";
                }
                ?>
              </select>
            </div>

            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for="tipovenda"><b>Tipo da Venda:</b></label>
              <select id="tipovenda" name="tipovenda" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option <?= isset($_GET['id']) && ($user['tipovenda'] == "atacado") ? "selected" : null ?> value="atacado">Atacado</option>
                <option <?= isset($_GET['id']) && ($user['tipovenda'] == "varejo") ? "selected" : null ?> value="varejo">Varejo</option>
                <option <?= isset($_GET['id']) && ($user['tipovenda'] == "exportacao") ? "selected" : null ?> value="exportacao">Exportação</option>
              </select>
            </div>

          </div> <!-- LINHA 1 -->

          <div class="form-row">
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="origemvenda"><b>Origem da Venda:</b></label>
              <select id="origemvenda" name="origemvenda" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option <?= isset($_GET['id']) && ($user['origemvenda'] == "verbal") ? "selected" : null ?> value="verbal">Verbal</option>
                <option <?= isset($_GET['id']) && ($user['origemvenda'] == "telefone") ? "selected" : null ?> value="telefone">Telefone</option>
                <option <?= isset($_GET['id']) && ($user['origemvenda'] == "correio") ? "selected" : null ?> value="correio">Correio</option>
                <option <?= isset($_GET['id']) && ($user['origemvenda'] == "micro") ? "selected" : null ?> value="micro">Interligação micro/micro</option>
              </select>
            </div>

            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="nomepromocao"><b>Desconto:</b></label>
              <select id="nomepromocao" name="nomepromocao" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option <?= isset($_GET['id']) && ($user['nomepromocao'] == "n") ? "selected" : null ?> value="n">Nenhuma</option>

                <?php
                while ($desconto = $result_descontos->fetch_assoc()) {
                  $selectP = ($id && $user['nomepromocao'] == $desconto['nomepromocao']) ? 'selected' : '';
                  echo "<option value='{$desconto['nomepromocao']}' $selectP>{$desconto['nomepromocao']}</option>";
                }
                ?>

              </select>
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="dia_venda"><b>Dia da venda:</b></label>
              <input type="date" class="form-control" id="dia_venda" name="dia_venda"
                value="<?= ($id) ? $user['dia_venda'] : null ?>">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for=""><b>Vendedor Responsável:</b></label>
              <input type="text" class="form-control" id="" name="">
            </div>

          </div> <!--  -->

          <hr>

          <h4>Produto a ser vendido:</h4>

          <div class="form-row">
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for=""><b>Código:</b></label>
              <input type="text" class="form-control" id="" name="" readonly>
            </div>
            <div class="form-group col-md-6 text-white">
              <label class="text-dark" for="produto"><b>Produto vendido:</b></label>
              <input type="text" class="form-control" id="produto" name="produto"
                value="<?= ($id) ? $user['produto'] : null ?>">
            </div>
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for="quantidade"><b>Quantidade:</b></label>
              <input type="number" class="form-control" id="quantidade" name="quantidade"
                value="<?= ($id) ? $user['quantidade'] : null ?>">
            </div>
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for="valor"><b>Valor P/un.:</b></label>
              <input type="tel" class="form-control" id="valor" name="valor"
                value="<?= ($id) ? $user['valor'] : null ?>">
            </div>
          </div> <!--  -->

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
              <th scope="col">Nº Pedido</th>
              <th scope="col">Nome Cliente</th>
              <th scope="col">Dia da Venda</th>
              <th scope="col">Produto</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Valor P/un</th>
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
                <td><?= $linha['id_venda'] ?></td>
                <td><?= $linha['nome'] ?></td>
                <td><?= $linha['dia_venda'] ?></td>
                <td><?= $linha['produto'] ?></td>
                <td><?= $linha['quantidade'] ?></td>
                <td><?= $linha['valor'] ?></td>
                <td>
                  <!-- Chamo a pagina de formulario e envio o id do usuario que sera alterado. -->
                  <a href="cadVendas.php?id=<?= $linha['id_venda']?>" class="btn btn-warning">Editar</a>

                  <button class="btn btn-danger btn-excluir"
                    data-table="cad_vendas" data-id="<?= $linha['id_venda'] ?>"> Excluir</button>
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