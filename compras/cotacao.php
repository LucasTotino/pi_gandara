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
        <div class="container-1">
        <h1 style="text-align:center;">Cotação</h1>
            <!-- Confirmação Email e Senha -->
            
                    
                                               

            <form action="/onstudies/usuarios/iu_usuario.php" method="POST"><!-- Inicio Formulário -->
                <div class="form-group">
                    <!-- Celular e Email -->
                    <div class="form-row justify-content-center mt-2">
                        <div class="form-group col-sm-3">
                            <label for="nivel_acesso" class="text-danger font-weight-bold">Solicitação:</label>
                            <select class="form-control" id="nivel_acesso" name="nivel_acesso">
                                <option value=""> -- ESCOLHA -- </option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 1) ? "selected" : null ?>
                                    value="1">1</option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                    value="0">2</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="nivel_acesso" class="text-danger font-weight-bold">Fornecedor:</label>
                            <select class="form-control" id="nivel_acesso" name="nivel_acesso">
                                <option value=""> -- ESCOLHA -- </option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 1) ? "selected" : null ?>
                                    value="1">Leno</option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                    value="0">Brega</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="email">Data de Abertura</label>
                            <input type="date" class="form-control" id="email" name="email" autocomplete="on">
                        </div>
                    </div>

                    <!-- Endereço -->
                    <div class="row justify-content-center mt-2">
                    <div class="form-group col-sm-3">
                            <label for="nivel_acesso" class="text-danger font-weight-bold">Código do Produto:</label>
                            <select class="form-control" id="nivel_acesso" name="nivel_acesso">
                                <option value=""> -- ESCOLHA -- </option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 1) ? "selected" : null ?>
                                    value="1">LA0001</option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                    value="0">LI0001</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <label for="logradouro">Quantidade</label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro">
                        </div>
                        <div class="col-sm-2">
                            <label for="numLogradouro">Unidade de Medida</label>
                            <input type="number" class="form-control" id="numLogradouro" name="numLogradouro">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-sm-2">
                            <label for="complemento">Data de Entrega</label>
                            <input type="date" class="form-control" id="complemento" name="complemento">
                        </div>
                        <div class="col-sm-3">
                            <label for="bairro">Status</label>
                            <input type="text" class="form-control" id="bairro" name="bairro">
                        </div>
                        <div class="col-sm-4">
                            <label for="cidade">Observações</label>
                            <input type="text" class="form-control" id="cidade" name="cidade">
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
    </main>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
    </body>

</html>