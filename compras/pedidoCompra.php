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

    <title>Solicitação de Compra</title>
</head>

<body>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>
    <main>
        <h1 style="text-align:center;">Pedido de Compra</h1>

        <div class="container">
            <div class="card card-cds">
                <form action="/pi_gandara/compras/bd/bd_pedido.php" method="POST"><!-- Inicio Formulário -->
                    <div class="form-group">

                        <div class="form-row justify-content-center mt-3">
                            <div class="col-sm-2">
                                <label for="id_solicitacao">Codigo</label>
                                <input type="text" class="form-control" id="id_solicitacao" name="id_solicitacao">
                            </div>
                            <div class="col-sm-2">
                                <label for="id_fornecedor">Fornecedor</label>
                                <input type="text" class="form-control" id="id_fornecedor" name="id_fornecedor">
                            </div>
                            <div class="col-sm-2">
                            <label for="data_pedido">Data do Pedido</label>
                            <input type="date" class="form-control" id="data_pedido" name="data_pedido" maxlength="15" onkeypress="mascara('(##) #####-####', this)">
                        </div>
                            <div class="col-sm-2">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" id="valor" name="valor">
                        </div>
                        </div>
                        

                    </div>

                    <!-- Endereço -->
                    <div class="row justify-content-center mt-2">
                        <div class="col-sm-2">
                            <label for="qtd">Quantidade</label>
                            <input type="number" class="form-control" id="qtd" name="qtd" maxlength="9" onkeypress="mascara('#####-###', this)">
                        </div>
                        <div class="col-sm-2">
                            <label for="pre_compra">Previsão de Compra</label>
                            <input type="date" class="form-control" id="pre_compra" name="pre_compra" maxlength="15" onkeypress="mascara('(##) #####-####', this)">
                        </div>
                        <div class="col-sm-2">
                            <label for="data_u_compra">Data Ultima Compra</label>
                            <input type="date" class="form-control" id="data_u_compra" name="data_u_compra" autocomplete="on">
                        </div>

                        <div class="col-sm-2">
                            <label for="historico">Histórico</label>
                            <input type="text" class="form-control" id="historico" name="historico">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-sm-2">
                            <label for="qtd_baixada">Quantidade Baixada</label>
                            <input type="number" class="form-control" id="qtd_baixada" name="qtd_baixada" maxlength="9" onkeypress="mascara('#####-###', this)">
                        </div>
                        <div class="col-sm-2">
                            <label for="valor_baixado">Valor Baixado</label>
                            <input type="number" class="form-control" id="valor_baixado" name="valor_baixado" maxlength="9" onkeypress="mascara('#####-###', this)">
                        </div>
                        <div class="col-sm-2">
                            <label for="saldo_qtd">Saldo Quantidade</label>
                            <input type="number" class="form-control" id="saldo_qtd" name="saldo_qtd" maxlength="9" onkeypress="mascara('#####-###', this)">
                        </div>

                        <div class="col-sm-2">
                            <label for="saldo_comprado">Saldo Comprado</label>
                            <input type="number" class="form-control" id="saldo_comprado" name="saldo_comprado">
                        </div>
                    </div>

                    <!-- Qualificação -->
                    <div class="form-row justify-content-center mt-2">

                    </div>

                    <!-- Botões -->
                    <div class="form-row justify-content-center mb-4">
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