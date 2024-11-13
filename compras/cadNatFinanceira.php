<?php
require '../utils/conexao.php';
// Verifica se veio um id na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";
// Caso tenha um ID faz A busca do Usuario no BD
if ($id) {
    $sql = "SELECT * FROM cad_nat_financeira WHERE id=?;";
    $stmt = $conn->prepare($sql);
    // Troca o ? pelo ID que veio na URL
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $dados = $stmt->get_result();

    // Verifica se encontrou o usuario ou se ele existe no BD
    if ($dados->num_rows > 0) {
        // Coloca os dados do usuário em uma variavel como array
        $natFin = $dados->fetch_assoc();
    } else {
        // Se não encontrou um usuario retorna para a página anterior.
?>
        <script>
            history.back();
        </script>
<?php
    }
}

// Seleciona apenas os campos que serão usados
$sql = "SELECT * FROM cad_nat_financeira;";

// Envia o SQL para o Prepare Statement:
$stmt = $conn->prepare($sql);

//Executa a consulta SQL
$stmt->execute();

//Pega o resultado e adiciona em uma variavel
$dados = $stmt->get_result();

$nivel = array(
    '',
    'Sintética', // Posição 0
    'Analítica' //Posição 1
);

$uso = array(
    '',
    'Contas a Receber',
    'Livre',
    'Contas a Pagar'
);

$mov = array(
    '',
    'Sim',
    'Não'
);
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/pi_gandara/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Cadastro de Natureza Financeira</title>
</head>

<body>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>
    <main>
        <h1 style="text-align:center;">Cadastro de Natureza Financeira</h1>

        <div class="container">
            <div class="card card-cds">
                <form action="/pi_gandara/compras/bd/bd_cadNatFinanceira.php" method="POST"><!-- Inicio Formulário -->
                    <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
                    <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
                    <div class="form-group">
                        <!-- Código, Descrição e Código Pai -->
                        <div class="form-row justify-content-center mt-2">
                            <div class="col-sm-2">
                                <label for="cod_nat">Código</label>
                                <input type="text" class="form-control" id="cod_nat" name="cod_nat"
                                    value="<?= ($id) ? $natFin['cod_nat'] : null ?>">
                            </div>
                            <div class="col-sm-7">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao"
                                    value="<?= ($id) ? $natFin['descricao'] : null ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="cod_pai">Código Pai</label>
                                <input type="text" class="form-control" id="cod_pai" name="cod_pai"
                                    value="<?= ($id) ? $natFin['cod_pai'] : null ?>">
                            </div>
                        </div>

                        <!-- Tipo, Uso, Inclusão e Perm. Bancária -->
                        <div class="form-row justify-content-center mt-2">
                            <!-- Tipo de Natureza: Define o tipo de Natureza de acordo com a seleção entre as opções Analíticas e Sintéticas. Quando esta informação estiver associada ao conteúdo do código da Natureza Pai, permite a estruturação do cadastro de naturezas nos moldes de um plano contábil, permitindo extrair os dados gerenciais em ambos os níveis de relatórios e consultas específicas.
                        Quando este campo não é preenchido ele assume a condição da natureza do tipo Analítica. -->
                            <div class="form-group col-sm-3">
                                <label for="tipo_nat">Tipo de Natureza:</label>
                                <select class="form-control" id="tipo_nat" name="tipo_nat">
                                    <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $natFin['tipo_nat'] == 2) ? "selected" : null ?>
                                        value="2">Analítica</option>
                                    <option <?= (isset($_GET['id']) && $natFin['tipo_nat'] == 1) ? "selected" : null ?>
                                        value="1">Sintética</option>
                                </select>
                            </div>
                            <!-- Uso Natureza: O conteúdo deste campo é definido por meio da seleção entre as opções:
                            Livre: indica que a natureza pode ser utilizada em qualquer movimento financeiro.
                            Contas a Receber: indica que a natureza somente pode ser utilizada em movimentos que tenham como partida a carteira de Contas a Receber (inclusões, faturas, liquidação etc).
                            Contas a Pagar: indica que a natureza só pode ser utilizada em movimentos que tenham como partida a carteira de Contas a Pagar (inclusões, faturas, liquidação etc).
                            Mov. Bancário: indica que a natureza pode ser utilizada somente em movimentos que tenham como partida procedimentos que envolvam movimentos bancários (manual, transferências entre contas correntes, movimentos bancários em geral, cheques etc). -->
                            <div class="form-group col-sm-4">
                                <label for="uso_nat">Uso da Natureza:</label>
                                <select class="form-control" id="uso_nat" name="uso_nat">
                                    <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $natFin['uso_nat'] == 2) ? "selected" : null ?>
                                        value="2">Livre</option>
                                    <option <?= (isset($_GET['id']) && $natFin['uso_nat'] == 1) ? "selected" : null ?>
                                        value="1">Contas a Receber</option>
                                    <option <?= (isset($_GET['id']) && $natFin['uso_nat'] == 3) ? "selected" : null ?>
                                        value="3">Contas a Pagar</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="data_inclusao">Data Inclusão</label>
                                <input type="date" class="form-control" id="data_inclusao" name="data_inclusao"
                                    value="<?= ($id) ? $natFin['data_inclusao'] : null ?>">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="mov_bancaria">Permite Mov, Bancária:</label>
                                <select class="form-control" id="mov_bancaria" name="mov_bancaria">
                                    <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $natFin['mov_bancaria'] == 1) ? "selected" : null ?>
                                        value="1">Sim</option>
                                    <option <?= (isset($_GET['id']) && $natFin['mov_bancaria'] == 2) ? "selected" : null ?>
                                        value="2">Não</option>
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
        <div class="container">
            <div class="card">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Tipo de Natureza</th>
                        <th>Uso</th>
                        <th>Data da Inclusão</th>
                        <th>Mov Bancária</th>
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
                                <td><?= $linha['cod_nat'] ?></td>
                                <td><?= $linha['descricao'] ?></td>
                                <td>
                                    <span>
                                        <?= $nivel[$linha['tipo_nat']] ?>
                                    </span>
                                <td>
                                    <span>
                                        <?= $uso[$linha['uso_nat']] ?>
                                    </span>
                                </td>
                                <td><?= $linha['data_inclusao'] ?></td>
                                <td>
                                    <span>
                                        <?= $mov[$linha['mov_bancaria']] ?>
                                    </span>
                                </td>
                                <td>
                                    <!-- Chamo a página do formulario e envio o Id do Produto que será alterado-->
                                    <a href="cadNatFinanceira.php?id=<?= $linha['id'] ?>" class="btn btn-warning">Editar</a>
                                    <button class="btn btn-danger btn-excluir" onclick="excluirRegistro('<?= $linha['id'] ?>', 'cadNatFinanceira')">Excluir</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>

</html>

<!-- Link de Referência: https://tdn.totvs.com/display/public/PROT/Naturezas+-+FINA010+-+Financeiro+-+P12 -->