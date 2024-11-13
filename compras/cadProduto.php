<?php
require '../utils/conexao.php';
// Verifica se veio um id na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";
// Caso tenha um ID faz A busca do Produto no BD
if ($id) {
    $sql = "SELECT * FROM cad_produtos WHERE id=?;";
    $stmt = $conn->prepare($sql);
    // Troca o ? pelo ID que veio na URL
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $dados = $stmt->get_result();

    // Verifica se encontrou o Produto ou se ele existe no BD
    if ($dados->num_rows > 0) {
        // Coloca os dados do usuário em uma variavel como array
        $produto = $dados->fetch_assoc();
    } else {
        // Se não encontrou um Produto retorna para a página anterior.
?>

        <script>
            history.back();
        </script>
<?php
    }
}

// Prepara a consulta SQL
$sql = "SELECT * FROM cad_produtos;";

// Seleciona apenas os campos que serão usados
$sql_eficiente = " SELECT id, produto, descricao, cod_produto, unidade FROM cad_produtos;";

// Envia o SQL para o Prepare Statement:
$stmt = $conn->prepare($sql);

//Executa a consulta SQL
$stmt->execute();

//Pega o resultado e adiciona em uma variavel
$dados = $stmt->get_result();

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/pi_gandara/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Cadastro de Produtos</title>
</head>

<body>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>
    <main>
        <h1 style="text-align:center;">Cadastro de Produto</h1>
        <!-- Confirmação Email e Senha -->

        <div class="container">
            <div class="card card-cds">
                <form class="mt-3 mb-3 ml-3 mr-3" action="/pi_gandara/compras/bd/bd_produto.php" method="POST">
                    <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
                    <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
                    <div class="form-group">
                        <!-- Nome, CPF e Data Nascimento -->
                        <div class="form-row justify-content-center mt-2">
                            <div class="col-sm-6">
                                <label for="produto">Produto</label>
                                <input type="text" class="form-control" id="produto" name="produto"
                                    value="<?= ($id) ? $produto['produto'] : null ?>">
                            </div>
                            <div class="col-sm-3">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao"
                                    value="<?= ($id) ? $produto['descricao'] : null ?>">
                            </div>
                        </div>

                        <!-- Celular e Email -->
                        <div class="form-row justify-content-center mt-2">
                            <div class="col-sm-3">
                                <label for="cod_produto">Código do Produto</label>
                                <input type="cod_produto" class="form-control" id="cod_produto" name="cod_produto"
                                    value="<?= ($id) ? $produto['cod_produto'] : null ?>">
                            </div>
                            <div class="col-sm-4">
                                <label for="unidade">Unidade</label>
                                <input type="unidade" class="form-control" id="unidade" name="unidade"
                                    value="<?= ($id) ? $produto['unidade'] : null ?>">
                            </div>
                        </div>

                        <!-- Botões -->
                        <div class="form-row justify-content-center">
                            <div class="col-sm-3 mt-3">
                                <button type="submit" name="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                            <div class="col-sm-3 mt-3">
                                <button type="reset" class="btn btn-warning">Cancelar</button>
                            </div>
                            <div class="col-sm-3 mt-3">
                                <a href="/pi_gandara/compras/index.php"><button type="button" class="btn btn-danger">Voltar</button></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Código</th>
                        <th>Produto</th>
                        <th>Descrição</th>
                        <th>Unidade</th>
                        <th>AÇÕES</th>
                    </thead>
                    <tbody>
                        <?php
                        // Laço de repetição
                        // Que irá exibir uma linha da tabela para cada registro no bd
                        // Adiciona cada registro na variavel linha como um Arrey.
                        while ($linha = $dados->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?= $linha['cod_produto'] ?></td>
                                <td><?= $linha['produto'] ?></td>
                                <td><?= $linha['descricao'] ?></td>
                                <td><?= $linha['unidade'] ?></td>
                                <td>
                                    <!-- Chamo a página do formulario e envio o Id do Produto que será alterado-->
                                    <a href="cadProduto.php?id=<?= $linha['id'] ?>" class="btn btn-warning">Editar</a>
                                    <button class="btn btn-danger btn-excluir" data-table="produto" data-id="<?= $linha['id'] ?>">Excluir</button>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.btn-excluir').click(function() {
                var userId = $(this).data('id');
                var tabela = $(this).data('table');

                var confirma = confirm(`Você tem certeza que deseja excluir o Produto [ ${userId} ] ?`);

                if (confirma) {
                    $.ajax({
                        url: `/pi_gandara/compras/bd/bd_${tabela}.php`,
                        type: 'POST',
                        data: {
                            acao: "DELETAR",
                            id_usuario: userId
                        },
                        success: function(response) {
                            var result = JSON.parse(response);
                            if (result.status === "sucesso") {
                                alert(result.message);
                                location.reload();
                            } else {
                                alert(result.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr);
                            alert("Ocorreu um erro: " + error);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>