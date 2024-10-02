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

    <title>Cadastro de Clientes</title>
</head>

<body>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>

    <main>
        <h1 style="text-align:center;">Cadastro de Cliente</h1>


        <div class="container">
            <div class="card card-cds">
                <form class="mt-3 mb-3 ml-3 mr-3" action="/onstudies/usuarios/iu_usuario.php" method="POST"><!-- Inicio Formulário -->
                    <div class="form-group ">
                        <!-- Nome, CPF -->
                        <div class="form-row justify-content-center mt-2">
                            <div class="col-sm-8">
                                <label for="nome">Nome </label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                            <div class="col-sm-4">
                                <label for="cpf">CPF/CNPJ</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" onkeypress="mascara('###.###.###-##', this)">
                            </div>
                        </div>

                        <!-- Tipo de Cliente e Dados de Contato -->
                        <div class="form-row justify-content-center mt-2">
                            <div class="form-group col-sm-3">
                                <label for="nivel_acesso" class="text-danger font-weight-bold">Tipo de Cliente:</label>
                                <select class="form-control" id="nivel_acesso" name="nivel_acesso">
                                    <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 1) ? "selected" : null ?>
                                        value="1">Pessoa Física</option>
                                    <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                        value="0">Pessoa Jurídica</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" autocomplete="on">
                            </div>
                            <div class="col-sm-3">
                                <label for="celular">Celular</label>
                                <input type="celular" class="form-control" id="celular" name="celular" maxlength="15" onkeypress="mascara('(##) #####-####', this)">
                            </div>
                        </div>

                        <hr>

                        <!-- Endereço -->

                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-8">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control" id="logradouro" name="logradouro">
                            </div>
                            <div class="col-sm-2">
                                <label for="numLogradouro">Número</label>
                                <input type="number" class="form-control" id="numLogradouro" name="numLogradouro">
                            </div>
                            <div class="col-sm-2">
                                <label for="complemento">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento">
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-3">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro">
                            </div>
                            <div class="col-sm-5">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade">
                            </div>
                            <div class="col-sm-2">
                                <label for="estado">Estado</label>
                                <div class="input-group">
                                    <select class="form-control" id="estado" name="estado">
                                        <option value=""> -- ESCOLHA -- </option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "AC") ? "selected" : null ?> value="AC">Acre</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "AL") ? "selected" : null ?> value="AL">Alagoas</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "AP") ? "selected" : null ?> value="AP">Amapá</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "AM") ? "selected" : null ?> value="AM">Amazonas</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "BA") ? "selected" : null ?> value="BA">Bahia</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "CE") ? "selected" : null ?> value="CE">Ceará</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "DF") ? "selected" : null ?> value="DF">Distrito Federal</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "ES") ? "selected" : null ?> value="ES">Espírito Santo</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "GO") ? "selected" : null ?> value="GO">Goiás</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "MA") ? "selected" : null ?> value="MA">Maranhão</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "MT") ? "selected" : null ?> value="MT">Mato Grosso</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "MS") ? "selected" : null ?> value="MS">Mato Grosso do Sul</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "MG") ? "selected" : null ?> value="MG">Minas Gerais</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "PA") ? "selected" : null ?> value="PA">Pará</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "PB") ? "selected" : null ?> value="PB">Paraíba</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "PR") ? "selected" : null ?> value="PR">Paraná</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "PE") ? "selected" : null ?> value="PE">Pernambuco</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "PI") ? "selected" : null ?> value="PI">Piauí</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "RJ") ? "selected" : null ?> value="RJ">Rio de Janeiro</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "RN") ? "selected" : null ?> value="RN">Rio Grande do Norte</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "RS") ? "selected" : null ?> value="RS">Rio Grande do Sul</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "RO") ? "selected" : null ?> value="RO">Rondônia</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "RR") ? "selected" : null ?> value="RR">Roraima</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "SC") ? "selected" : null ?> value="SC">Santa Catarina</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "SP") ? "selected" : null ?> value="SP">São Paulo</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "SE") ? "selected" : null ?> value="SE">Sergipe</option>
                                        <option <?= (isset($_GET['id']) && $user['estado'] == "TO") ? "selected" : null ?> value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label for="cep">CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" maxlength="9" onkeypress="mascara('#####-###', this)">
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