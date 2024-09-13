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
        <div class="container-1">
            <h1 style="text-align:center;">Solicitação de Compra</h1>
            <!-- Confirmação Email e Senha -->
            
                    
                                               

            <form action="/onstudies/usuarios/iu_usuario.php" method="POST"><!-- Inicio Formulário -->
                <div class="form-group">
                    <!-- Nome, CPF e Data Nascimento -->
                    <div class="form-row justify-content-center mt-2">
                        <div class="col-sm-2">
                            <label for="nome">Item</label>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="col-sm-6">
                            <label for="cpf">Descrição</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" onkeypress="mascara('###.###.###-##', this)">
                        </div>
                    </div>
                    
                    <!-- Celular e Email -->
                    <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-2">
                        <label for="criador">Criador</label>
                        <input type="text" class="form-control" id="criador" name="criador">
                    </div>
                        <div class="form-group col-sm-2">
                            <label for="nivel_acesso" class="text-danger font-weight-bold">Origem:</label>
                            <select class="form-control" id="nivel_acesso" name="nivel_acesso">
                                <option value=""> -- ESCOLHA -- </option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 1) ? "selected" : null ?>
                                    value="5">Estoque</option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                    value="4">Compras</option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                    value="3">PCP</option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                    value="2">Financeiro</option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                    value="1">Folha de Pagamento</option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                    value="0">Comercial</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <label for="observacao">Observação</label>
                            <input type="text" class="form-control" id="observacao" name="observacao">
                        </div>

                    </div>

                    <!-- Endereço -->
                    <div class="row justify-content-center mt-2">
                        <div class="col-sm-2">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade" maxlength="9" onkeypress="mascara('#####-###', this)">
                        </div>
                        <div class="col-sm-2">
                            <label for="dataentrega">Data de Entrega</label>
                            <input type="date" class="form-control" id="dataentrega" name="dataentrega" maxlength="15" onkeypress="mascara('(##) #####-####', this)">
                        </div>
                        <div class="col-sm-2">
                            <label for="datacriacao">Data de Criação</label>
                            <input type="date" class="form-control" id="datacriacao" name="datacriacao" autocomplete="on">
                        </div>

                        <div class="col-sm-2">
                            <label for="finalidade">Finalidade</label>
                            <input type="text" class="form-control" id="finalidade" name="finalidade">
                        </div>
                    </div>

                    <!-- Qualificação -->
                    <div class="form-row justify-content-center mt-2">

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