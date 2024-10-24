<?php
require '../utils/conexao.php';
// Verifica se veio um id na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";
// Caso tenha um ID faz A busca da Solicitação no BD
if ($id) {
    $sql = "SELECT * FROM sol_compra WHERE id=?;";
    $stmt = $conn->prepare($sql);
    // Troca o ? pelo ID que veio na URL
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $dados = $stmt->get_result();

    // Verifica se encontrou a Solicitação ou se ela existe no BD
    if ($dados->num_rows > 0) {
        // Coloca os dados da Solicitação em uma variavel como array
        $solCompra = $dados->fetch_assoc();
    } else {
        // Se não encontrou uma Solicitação retorna para a página anterior.
?>
        <script>
            history.back();
        </script>
<?php
    }
}

// Prepara a consulta SQL
$sql = "SELECT sc.id, sc.data_entrega, sc.data_criacao, sc.qtd, sc.origem, p.cod_produto, p.produto, u.nome FROM sol_compra sc
INNER JOIN cad_produtos p on sc.id_produto = p.id
INNER JOIN usuarios u on sc.id_usuario = u.id_usuario";

// Envia o SQL para o Prepare Statement:
$stmt = $conn->prepare($sql);

//Executa a consulta SQL
$stmt->execute();

//Pega o resultado e adiciona em uma variavel
$dados = $stmt->get_result();

// Prepara a consulta SQL da tabela de Produtos
$sql_produtos = "SELECT id, cod_produto, produto, descricao FROM cad_produtos"; // Ajuste os campos conforme necessário
$stmt_produtos = $conn->prepare($sql_produtos);
$stmt_produtos->execute();
$result_produtos = $stmt_produtos->get_result();

// Prepara a consulta SQL da tabela de Usuarios
$sql_usuarios = "SELECT id_usuario, nome FROM usuarios"; // Ajuste os campos conforme necessário
$stmt_usuarios = $conn->prepare($sql_usuarios);
$stmt_usuarios->execute();
$result_usuarios = $stmt_usuarios->get_result();

// Substitui o valor INT no banco de dados pelo nome do setor que fez a solicitação
$nivel = array(
    'Comercial',
    'Folha de Pagamento',
    'Financeiro',
    'PCP',
    'Compras',
    'Estoque'
);
?>

<!-- Inicio do HTML -->
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/pi_gandara/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Solicitação de Compra</title>
</head>

<body>
    <!-- Menu Lateral -->
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>
    <main>
        <!-- Título da Página -->
        <h1 style="text-align:center;">Solicitação de Compra</h1>

        <!-- Container de alimentação de dados -->
        <div class="container">
            <div class="card card-cds">

                <!-- Inicio Formulário -->
                <form action="/pi_gandara/compras/bd/bd_solicitacao.php" method="POST">

                    <!-- Checa se veio um ID junto dá página para decidir se vai Alterar ou Incluir um registro -->
                    <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
                    <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
                    <div class="form-group">

                        <!-- Item e Criador da Solicitação -->
                        <div class="form-row justify-content-center mt-3">
                            <div class="col-sm-6">
                                <label for="id_produto">Item</label>
                                <select class="form-control" name="id_produto" id="id_produto">
                                    <option value="">Selecione o Produto</option>
                                    <?php
                                    while ($produto = $result_produtos->fetch_assoc()) {
                                        $selectP = ($id && $solCompra['id_produto'] == $produto['id']) ? 'selected' : '';
                                        echo "<option value='{$produto['id']}' $selectP>{$produto['cod_produto']} - {$produto['produto']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="criador">Criador</label>
                                <<select class="form-control" name="id_usuario" id="id_usuario">
                                    <option value="">Selecione o Criador</option>
                                    <?php
                                    while ($usuario = $result_usuarios->fetch_assoc()) {
                                        $selectU = ($id && $solCompra['id_usuario'] == $usuario['id_usuario']) ? 'selected' : '';
                                        echo "<option value='{$usuario['id_usuario']}' $selectU>{$usuario['nome']}</option>";
                                    }
                                    ?>
                                    </select>
                            </div>
                        </div>

                        <!-- Descrição e Observação -->
                        <div class="form-row justify-content-center mt-3">
                            <div class=" col-sm-6">
                                <label for="descricao">Descrição</label>
                                <input type="text" id="descricao" class="form-control" readonly
                                    value="<?php $produto['descricao'] ?>">
                            </div>
                            <div class="col-sm-5">
                                <label for="observacao">Observação</label>
                                <input type="text" class="form-control" id="observacao" name="observacao"
                                    value="<?= ($id) ? $solCompra['observacao'] : null ?>">
                            </div>
                        </div>

                        <!-- Quantidade, Data de Entrega, Criação, Finalidade e Origem -->
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-2">
                                <label for="qtd">Quantidade</label>
                                <input type="number" class="form-control" id="qtd" name="qtd"
                                    value="<?= ($id) ? $solCompra['qtd'] : null ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="dataentrega">Data de Entrega</label>
                                <input type="date" class="form-control" id="dataentrega" name="dataentrega"
                                    value=" <?= ($id) ? $solCompra['data_entrega'] : null ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="datacriacao">Data de Criação</label>
                                <input type="date" class="form-control" id="datacriacao" name="datacriacao" readonly
                                    value="<?= ($id) ? $solCompra['data_criacao'] : null ?>">
                            </div>

                            <div class="col-sm-2">
                                <label for="finalidade">Finalidade</label>
                                <input type="text" class="form-control" id="finalidade" name="finalidade"
                                    value="<?= ($id) ? $solCompra['finalidade'] : null ?>">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="origem" class="text-danger font-weight-bold">Origem:</label>
                                <select class="form-control" id="origem" name="origem">
                                    <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $solCompra['origem'] == 1) ? "selected" : null ?>
                                        value="5">Estoque</option>
                                    <option <?= (isset($_GET['id']) && $solCompra['origem'] == 0) ? "selected" : null ?>
                                        value="4">Compras</option>
                                    <option <?= (isset($_GET['id']) && $solCompra['origem'] == 0) ? "selected" : null ?>
                                        value="3">PCP</option>
                                    <option <?= (isset($_GET['id']) && $solCompra['origem'] == 0) ? "selected" : null ?>
                                        value="2">Financeiro</option>
                                    <option <?= (isset($_GET['id']) && $solCompra['origem'] == 0) ? "selected" : null ?>
                                        value="1">Folha de Pagamento</option>
                                    <option <?= (isset($_GET['id']) && $solCompra['origem'] == 0) ? "selected" : null ?>
                                        value="0">Comercial</option>
                                </select>
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

        <!-- Container da Tabela de Registros -->
        <div class="container">
            <div class="card">

                <!-- Cabeçalho da Tabela -->
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Código</th>
                        <th>Produto</th>
                        <th>Usuario</th>
                        <th>Origem</th>
                        <th>D. Entrega</th>
                        <th>D. Criação</th>
                        <th>Quantidade</th>
                        <th>AÇÕES</th>
                    </thead>

                    <!-- Corpo da Tabela -->
                    <tbody>
                        <?php
                        // Laço de repetição para exibir os registros do bd
                        while ($linha = $dados->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?= $linha['cod_produto'] ?></td>
                                <td><?= $linha['produto'] ?></td>
                                <td><?= $linha['nome'] ?></td>
                                <td>
                                    <span">
                                        <?= $nivel[$linha['origem']] ?>
                                        </span>
                                </td>
                                <td><?= $linha['data_entrega'] ?></td>
                                <td><?= $linha['data_criacao'] ?></td>
                                <td><?= $linha['qtd'] ?></td>
                                <td>
                                    <!-- Chamo o id da Solicitação para a página do formulario-->
                                    <a href="solicitacaoCompra.php?id=<?= $linha['id'] ?>" class="btn btn-warning">Editar</a>
                                    <button class="btn btn-danger btn-excluir" data-table="sol_compra" data-id="<?= $linha['id'] ?>">Excluir</button>
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
    <script src="/pi_gandara/js/script.js"></script>
    <script>
        // Pega o id do Produto selecionado 
        document.getElementById('id_produto').addEventListener('change', function carregaDescricao() {
            const produtoId = this.value;

            // Consulta a página da Descrição para carregar a descrição do produto por id 
            if (produtoId) {
                fetch('utils/descricao.php?id=' + produtoId)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('descricao').value = data;
                    })
                    .catch(error => console.error('Erro:', error));
            } else {
                document.getElementById('descricao').value = '';
            }

            // Configura o formato da data
            const hoje = new Date();
            const dia = String(hoje.getDate()).padStart(2, '0');
            const mes = String(hoje.getMonth() + 1).padStart(2, '0');
            const ano = hoje.getFullYear();
            const dataFormatada = `${ano}-${mes}-${dia}`;

            // Atribui a data de criação ao campo se não houver um valor já definido
            const campoData = document.getElementById('datacriacao');
            if (!campoData.value) {
                campoData.value = dataFormatada;
            }
        });

        // Atualiza o campo de descrição caso vá ser feita alguma alteração em um registro da tabela.
            window.addEventListener('DOMContentLoaded', function() {
            const produtoId = document.getElementById('id_produto').value;
            carregarDescricao(produtoId); // Preenche a descrição com base no valor inicial
        });
    </script>
</body>

</html>