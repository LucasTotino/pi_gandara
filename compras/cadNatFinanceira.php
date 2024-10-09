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
                <form action="/onstudies/usuarios/iu_usuario.php" method="POST"><!-- Inicio Formulário -->
                    <div class="form-group">
                        <!-- Código, Descrição e Código Pai -->
                        <div class="form-row justify-content-center mt-2">
                            <div class="col-sm-2">
                                <label for="nome">Código</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                            <div class="col-sm-7">
                                <label for="cpf">Descrição</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" onkeypress="mascara('###.###.###-##', this)">
                            </div>
                            <div class="col-sm-2">
                                <label for="celular">Código Pai</label>
                                <input type="celular" class="form-control" id="celular" name="celular" maxlength="15" onkeypress="mascara('(##) #####-####', this)">
                            </div>
                        </div>

                        <!-- Tipo, Uso, Inclusão e Perm. Bancária -->
                        <div class="form-row justify-content-center mt-2">
                            <!-- Tipo de Natureza: Define o tipo de Natureza de acordo com a seleção entre as opções Analíticas e Sintéticas. Quando esta informação estiver associada ao conteúdo do código da Natureza Pai, permite a estruturação do cadastro de naturezas nos moldes de um plano contábil, permitindo extrair os dados gerenciais em ambos os níveis de relatórios e consultas específicas.
                        Quando este campo não é preenchido ele assume a condição da natureza do tipo Analítica. -->
                            <div class="form-group col-sm-2">
                                <label for="nivel_acesso" class="text-danger font-weight-bold">Tipo de Natureza:</label>
                                <select class="form-control" id="nivel_acesso" name="nivel_acesso">
                                    <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 1) ? "selected" : null ?>
                                        value="1">Analítica</option>
                                    <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                        value="0">Sintética</option>
                                </select>
                            </div>
                            <!-- Uso Natureza: O conteúdo deste campo é definido por meio da seleção entre as opções:
                            Livre: indica que a natureza pode ser utilizada em qualquer movimento financeiro.
                            Contas a Receber: indica que a natureza somente pode ser utilizada em movimentos que tenham como partida a carteira de Contas a Receber (inclusões, faturas, liquidação etc).
                            Contas a Pagar: indica que a natureza só pode ser utilizada em movimentos que tenham como partida a carteira de Contas a Pagar (inclusões, faturas, liquidação etc).
                            Mov. Bancário: indica que a natureza pode ser utilizada somente em movimentos que tenham como partida procedimentos que envolvam movimentos bancários (manual, transferências entre contas correntes, movimentos bancários em geral, cheques etc). -->
                            <div class="form-group col-sm-5">
                                <label for="email">Uso Natureza</label>
                                <input type="email" class="form-control" id="email" name="email" autocomplete="on">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="cep">Data Inclusão</label>
                                <input type="date" class="form-control" id="cep" name="cep" maxlength="9" onkeypress="mascara('#####-###', this)">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="nivel_acesso" class="text-danger font-weight-bold">Permite Mov, Bancária:</label>
                                <select class="form-control" id="nivel_acesso" name="nivel_acesso">
                                    <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 1) ? "selected" : null ?>
                                        value="1">Sim</option>
                                    <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                        value="0">Não</option>
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
    </main>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>

<!-- Link de Referência: https://tdn.totvs.com/display/public/PROT/Naturezas+-+FINA010+-+Financeiro+-+P12 -->