<?php
if (isset($_POST['submit'])) {

    // Iniciando conexao
    include_once('../funcoes/conexao.php');

    // Variaveis principais
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $numLogradouro = $_POST['numLogradouro'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $senha = $_POST['senha'];
    $qualificacao = $_POST['qualificacao'];
}
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
                <form action="/onstudies/usuarios/iu_usuario.php" method="POST"><!-- Inicio Formulário -->
                    <div class="form-group">
                        <div class="form-row justify-content-center mt-2">

                            <div class="col-sm-2">
                                <label for="operacao">Operação</label>
                                <input type="text" class="form-control" id="operacao" name="operacao">
                            </div>
                            <div class="col-sm-2">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" autocomplete="on">
                            </div>
                            <div class="col-sm-">
                                <label for="unidadeconvercao">Unidade Converção</label>
                                <input type="text" class="form-control" id="unidadeconvercao" name="unidadeconvercao" autocomplete="on">
                            </div>
                            <div class="col-sm-">
                                <label for="quantidadeconvercao">Quantidade Converção</label>
                                <input type="text" class="form-control" id="quantidadeconvercao" name="quantidadeconvercao" autocomplete="on">
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="form-group col-sm-2">
                                <label for="nivel_acesso" class="text-danger font-weight-bold">Código do Produto:</label>
                                <select class="form-control" id="nivel_acesso" name="nivel_acesso">
                                    <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 1) ? "selected" : null ?>
                                        value="1">LA0001</option>
                                    <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                        value="0">LI0001</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="quantidade">Quantidade</label>
                                <input type="text" class="form-control" id="quantidade" name="quantidade">
                            </div>
                            <div class="col-sm-2">
                                <label for="valorunit">Valor Unitario</label>
                                <input type="number" class="form-control" id="valorunit" name="valorunit">
                            </div>
                            <div class="col-sm-2">
                                <label for="valorunitconv">Valor Unitario Conv</label>
                                <input type="number" class="form-control" id="valorunitconv" name="valorunitconv">
                            </div>
                            <div class="col-sm-2">
                                <label for="unidademedida">Unidade de Medida</label>
                                <input type="number" class="form-control" id="unidademedida" name="unidademedida">
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-2">
                                <label for="totalbruto">Total Bruto</label>
                                <input type="text" class="form-control" id="totalbruto" name="totalbruto">
                            </div>
                            <div class="col-sm-2">
                                <label for="porcdesconto">% Desconto</label>
                                <input type="text" class="form-control" id="porcdesconto" name="porcdesconto">
                            </div>
                            <div class="col-sm-2">
                                <label for="valordesc">Valor do Desconto</label>
                                <input type="text" class="form-control" id="valordesc" name="valordesc">
                            </div>
                            <div class="col-sm-2">
                                <label for="totalliquido">Total Liquido</label>
                                <input type="text" class="form-control" id="totalliquido" name="totalliquido">
                            </div>
                            <div class="col-sm-2">
                                <label for="tributo">Tributo</label>
                                <input type="text" class="form-control" id="tributo" name="tributo">
                            </div>

                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-2">
                                <label for="despesas">Despesas</label>
                                <input type="text" class="form-control" id="despesas" name="despesas">
                            </div>
                            <div class="col-sm-2">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" id="total" name="total">
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
</body>

</html>