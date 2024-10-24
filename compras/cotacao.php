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

$sql = "SELECT * FROM cotacao";
$stmt = $conn->prepare($sql);
$stmt->execute();
$dados = $stmt->get_result();

// Prepara a consulta SQL
$sql_sol_compra = "SELECT s.id, p.cod_produto, p.produto, p.descricao, s.data_criacao, s.observacao 
                               FROM sol_compra s 
                               JOIN cad_produtos p ON s.id_produto = p.id";

// Envia o SQL para o Prepare Statement:
$stmt_sol_compra = $conn->prepare($sql_sol_compra);

//Executa a consulta SQL
$stmt_sol_compra->execute();

//Pega o resultado e adiciona em uma variavel
$result_solicitacao = $stmt_sol_compra->get_result();

// Prepara a consulta SQL da tabela de Usuarios
$sql_forncedores = "SELECT id, nome FROM cad_fornecedor"; // Ajuste os campos conforme necessário
$stmt_fornecedores = $conn->prepare($sql_forncedores);
$stmt_fornecedores->execute();
$result_fornecedores = $stmt_fornecedores->get_result();

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
                                    while ($solicitacao = $result_solicitacao->fetch_assoc()) {
                                        $selectS = ($id && $cotacao['id_sol_compra'] == $solicitacao['id']) ? 'selected' : '';
                                        echo "<option value='{$solicitacao['id']}' $selectS>{$solicitacao['id']} - {$solicitacao['cod_produto']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status">
                            </div>
                            <div class="col-sm-5">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $solicitacao['descricao']; ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="data_abertura">Data de Abertura</label>
                                <input type="date" class="form-control" id="data_abertura" name="data_abertura">
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="form-group col-sm-3">
                                <label for="id_produto" class="font-weight-bold">Código do Produto:</label>
                                <input type="text" id="id_produto" name="id_produto" class="form-control" readonly
                                    value="<?= $solicitacao['produto']; ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="qtd">Quantidade</label>
                                <input type="text" class="form-control" id="qtd" name="qtd">
                            </div>
                            <div class="col-sm-2">
                                <label for="data_entrega">Data de Entrega</label>
                                <input type="date" class="form-control" id="data_entrega" name="data_entrega">
                            </div>
                            <div class="col-sm-2">
                                <label for="u_medida">Unidade de Medida</label>
                                <input type="text" class="form-control" id="u_medida" name="u_medida">
                            </div>
                            <div class="col-sm-2">
                                <label for="valor">Valor</label>
                                <input type="float" class="form-control" id="valor" name="valor">
                            </div>
                        </div>

                        <div class="row justify-content-center mt-2">
                            <div class="form-group col-sm-5">
                                <label for="id_fornecedor" class="text-danger font-weight-bold">Fornecedor:</label>
                                <select class="form-control" name="id_sol_compra" id="id_sol_compra">
                                    <option value="">Selecione a Solicitação de Compra</option>
                                    <?php
                                    while ($fornecedor = $result_fornecedores->fetch_assoc()) {
                                        $selectF = ($id && $cotacao['id_fornecedor'] == $fornecedor['id']) ? 'selected' : '';
                                        echo "<option value='{$fornecedor['id']}' $selectF>{$fornecedor['id']} - {$fornecedor['nome']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="observacao">Observações</label>
                                <input type="text" class="form-control" id="observacao" name="observacao" readonly
                                    value="<?php $solicitacao['observacao'] ?>">
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
        document.getElementById('id_sol_compra').addEventListener('change', function carregaProduto() {
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