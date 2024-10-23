<?php
require '../utils/conexao.php';
// Verifica se veio um id na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";
// Caso tenha um ID faz A busca do Produto no BD
if ($id) {
    $sql = "SELECT * FROM cotacao WHERE id=?;";
    $stmt = $conn->prepare($sql);
    // Troca o ? pelo ID que veio na URL
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $dados = $stmt->get_result();

    // Verifica se encontrou o Produto ou se ele existe no BD
    if ($dados->num_rows > 0) {
        // Coloca os dados do usuário em uma variavel como array
        $cotacao = $dados->fetch_assoc();
    } else {
        // Se não encontrou um Produto retorna para a página anterior.
?>

        <script>
            history.back();
        </script>
<?php
    }
}

$sql = "SELECT c.id, s.id_produto, s.observacao, s.data_criacao FROM cotacao c
                JOIN sol_compra s ON c.id_sol_compra = s.id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$dados = $stmt->get_result();

// Prepara a consulta SQL da tabela de sol_compra
$sql_sol_compra = "SELECT id, observacao FROM sol_compra";
$stmt_sol_compra = $conn->prepare($sql_sol_compra);
$stmt_sol_compra->execute();
$result_sol_compra = $stmt_sol_compra->get_result();

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/pi_gandara/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Cotação</title>
</head>

<body>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>
    <main>
        <h1 style="text-align:center;">Cotação</h1>

        <div class="container">
            <div class="card card-cds">
                <form action="/pi_gandara/compras/bd/bd_cotacao.php" method="POST"><!-- Inicio Formulário -->

                    <!-- Checa se veio um ID junto dá página para decidir se vai Alterar ou Incluir um registro -->
                    <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
                    <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
                    <div class="form-group">
                        <div class="form-row justify-content-center mt-2">
                            <div class="form-group col-sm-2">
                                <label for="id_sol_compra">Solicitação:</label>
                                <select class="form-control" name="id_sol_compra" id="id_sol_compra">
                                    <option value="">Selecione a Solicitação de Compra</option>
                                    <?php
                                    while ($solicitacao = $result_sol_compra->fetch_assoc()) {
                                        $selectS = ($id && $cotacao['id_sol_compra'] == $solicitacao['id']) ? 'selected' : '';
                                        echo "<option value='{$solicitacao['id']}' $selectS>{$solicitacao['id']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-2">
                            <div class=" col-sm-6">
                                <label for="observacao">Observação</label>
                                <input type="text" id="observacao" name="observacao" class="form-control" readonly
                                    value="<?= isset($solicitacao['observacao']) ? $solicitacao['observacao'] : '' ?>">
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
    </main>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
    <script src="/pi_gandara/js/script.js"></script>
    <script>
        document.getElementById('id_sol_compra').addEventListener('change', function() {
            const solCompraId = this.value;
            // Consulta a página da Descrição para carregar a descrição do produto por id 
            if (solCompraId) {
                fetch('utils/produto.php?id=' + solCompraId)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('observacao').value = data;
                    })
                    .catch(error => console.error('Erro:', error));
            } else {
                document.getElementById('observacao').value = '';
            }
        });
    </script>

</body>

</html>