<?php
require '../utils/conexao.php';
// Verifica se veio um id na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";
// Caso tenha um ID faz A busca do Produto no BD
if ($id) {
    $sql = "SELECT * FROM cad_novobanco WHERE id=?;";
    $stmt = $conn->prepare($sql);
    // Troca o ? pelo ID que veio na URL
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $dados = $stmt->get_result();

    // Verifica se encontrou o Produto ou se ele existe no BD
    if ($dados->num_rows > 0) {
        // Coloca os dados do usuário em uma variavel como array
        $instituicao = $dados->fetch_assoc();
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
$sql = "SELECT * FROM cad_novobanco;";

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

    <title>Cadastrar Novo Banco</title>
</head>

<body>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>
    <main>
        <h1 style="text-align: center;" class="col-11 display-4">Cadastrar nova conta bancária</h1>
        <!-- Confirmação Email e Senha -->

        <div class="container">
            <div class="card card-cds">
                <form class="mt-3 mb-3 ml-3 mr-3" action="/pi_gandara/compras/bd/bd_produto.php" method="POST">
                    <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
                    <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
                    <div class="form-group">

                        <div class="form-row justify-content-center mt-2">
                            <div class="col-sm-6">
                                <label for="nomeInstituicao">Nome do Instituição Financeira</label>
                                <input type="text" class="form-control" id="nomeInstituicao" name="nomeInstituicao"
                                    value="<?= ($id) ? $nomeInstituicao['nomeInstituicao'] : null ?>">
                            </div>
                            <div class="col-sm-4">
                                <label for="numeroConta">Número da Conta + Digito verificador</label>
                                <input type="numeroConta" class="form-control" id="numeroConta" name="numeroConta"
                                    value="<?= ($id) ? $numeroConta['numeroConta'] : null ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="codBanco">Código do Banco</label>
                                <span href="https://proplad.furg.br/images/Lista_Cdigo_de_Bancos.pdf" class="fa-solid fa-circle-question fa-beat" style="--fa-animation-duration: 5s;" aria-hidden="true"></span>
                                <input type="text" class="form-control" id="codBanco" name="codBanco"
                                    value="<?= ($id) ? $codBanco['codBanco'] : null ?>">
                            </div>

                        </div>

                        <br>

                        <div class="form-row justify-content-center mt-2">
                            <div class="col-sm-3">
                                <label for="tipoConta">Tipo da Conta:</label>
                                <select class="form-control" id="tipoConta" name="tipoConta">
                                    <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $user['tipoConta'] == "corrente") ? "selected" : null ?>
                                        value="corrente">CORRENTE</option>
                                    <option <?= (isset($_GET['id']) && $user['tipoConta'] == "poupanca") ? "selected" : null ?>
                                        value="poupanca">POUPANÇA</option>
                                    <option <?= (isset($_GET['id']) && $user['tipoConta'] == "salario") ? "selected" : null ?>
                                        value="salario">SALÁRIO</option>
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <label for="tipoConta">Selecione a Moeda:</label>
                                <select class="form-control" id="moeda" name="moeda">
                                <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $user['moeda'] == "BRL") ? "selected" : null ?>
                                        value="BRL">BRL</option>
                                    <option <?= (isset($_GET['id']) && $user['moeda'] == "USD") ? "selected" : null ?>
                                        value="USD">USD</option>
                                    <option <?= (isset($_GET['id']) && $user['moeda'] == "EUR") ? "selected" : null ?>
                                        value="EUR">EUR</option>
                                </select>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="anotacoes">Anotações:</label>
                                <textarea class="text" id="anotacoes" placeholder="Insira anotações"></textarea>
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
                                <a href="/pi_gandara/financeiro/gerBancario.php"><button type="button" class="btn btn-danger">Voltar</button></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
    <script src="/pi_gandara/js/script.js"></script>
</body>

</html>

<!-- 
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="dataDaTransacao">Data da Transação:</label>
                        <input type="date" class="form-control" id="dataDaTransacao">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tipoDeTransacao">Tipo de Transação:</label>
                        <select class="form-control" id="tipoDeTransacao">
                            <option value="">Selecione o tipo de transação</option>
                            <option value="deposito">Depósito</option>
                            <option value="saque">Saque</option>
                            <option value="transferencia">Transferência</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="valorDaTransacao">Valor da Transação:</label>
                        <input type="number" class="form-control" id="valorDaTransacao" placeholder="Insira o valor da transação">
                    </div>
                </div>



                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomeDeUsuario">Nome de Usuário:</label>
                        <input type="text" class="form-control" id="nomeDeUsuario" placeholder="Insira o nome de usuário">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" id="senha" placeholder="Insira a senha">
                    </div>
                </div>



                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="extratoBancario">Extrato Bancário:</label>
                        <input type="file" class="form-control" id="extratoBancario">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="statusDeReconciliacao">Status de Reconciliação:</label>
                        <select class="form-control" id="statusDeReconciliacao">
                            <option value="">Selecione o status de reconciliação</option>
                            <option value="reconciliado">Reconciliado</option>
                            <option value="nãoReconciliado">Não Reconciliado</option>
                        </select>
                    </div>

                </div> -->