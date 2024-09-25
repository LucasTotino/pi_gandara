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

    <title>Cadastro de Tipos de Entrada e Saída</title>
</head>

<body>

    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>
    <main>
        <h1 style="text-align:center;">Cadastro de Tipo de Entrada/Saída</h1>

        <div class="container">
            <form action="/onstudies/usuarios/iu_usuario.php" method="POST"><!-- Inicio Formulário -->
                <div class="form-group">
                    <!-- Código e Descrição TES -->
                    <div class="form-row justify-content-center mt-2">
                        <div class="col-sm-2">
                            <label for="nome">Código TES</label>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="col-sm-3">
                            <label for="cpf">Descrição</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" onkeypress="mascara('###.###.###-##', this)">
                        </div>
                    </div>

                    <!-- Tab links -->
                    <div class="tab-container">
                        <div class="tab" onclick="openTab('tab1')">Tab 1</div>
                        <div class="tab" onclick="openTab('tab2')">Tab 2</div>
                        <div class="tab" onclick="openTab('tab3')">Tab 3</div>
                    </div>

                    <div id="tab1" class="tab-content active-content">
                        <h2>Content for Tab 1</h2>
                        <p>This is the content for Tab 1.</p>
                    </div>

                    <div id="tab2" class="tab-content">
                        <h2>Content for Tab 2</h2>
                        <p>This is the content for Tab 2.</p>
                    </div>

                    <div id="tab3" class="tab-content">
                        <h2>Content for Tab 3</h2>
                        <p>This is the content for Tab 3.</p>
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
    <script src="../js/script.js"></script>

</body>

</html>

<!-- link de referência: https://si14.com.br/manual/como-cadastrar-t-e-s-tipo-de-entrada-e-saida/ -->