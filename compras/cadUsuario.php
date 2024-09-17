<?php
//require '../utils/conexao.php';
// Verifica se veio um id na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";
// Caso tenha um ID faz A busca do Usuario no BD
if ($id) {
    $sql = "SELECT * FROM usuarios WHERE id_usuario=?;";
    $stmt = $conn->prepare($sql);
    // Troca o ? pelo ID que veio na URL
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $dados = $stmt->get_result();

    // Verifica se encontrou o usuario ou se ele existe no BD
    if ($dados->num_rows > 0) {
        // Coloca os dados do usuário em uma variavel como array
        $user = $dados->fetch_assoc();
    } else {
        // Se não encontrou um usuario retorna para a página anterior.
?>

        <script>
            history.back();
        </script>
<?php
    }

    //Como converter data do JP para PT-BR

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

    <title>Cadastro de Usuários</title>
</head>

<body>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>
    <main>
        <div class="container-1">
        <h1 style="text-align:center;">Cadastro de Usuário</h1>
            <!-- Confirmação Email e Senha -->
            <?php
            if (isset($_POST['submit'])) {
                if ($email == $confirmaEmail) {
                    if ($senha == $confirmaSenha) {
                        $result = mysqli_query($mysqli, "INSERT INTO usuarios (nome, cpf, data_nascimento, qualificacao, senha, email, celular, cep, 
                                                logradouro, numero, complemento, bairro, cidade, estado)
                                        VALUES           ('$nome', '$cpf', '$nascimento', '$qualificacao', '$senha', '$email',
                                                '$celular', '$cep', '$logradouro', '$numLogradouro', '$complemento', '$bairro', '$cidade', '$estado')");
                    } else {
                        echo "<div class=\"alert alert-warning\" role=\"alert\">Senhas Divergentes</div>";
                    }
                } else {
                    echo "<div class=\"alert alert-warning\" role=\"alert\">Emails Divergentes</div>";
                }
            }
            ?>

<form id="userForm" action="/site-pi/bd/bd-usuario.php" method="POST">
                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
                    <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required
                            value="<?= ($id) ? $user['nome'] : null ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                            value="<?= ($id) ? $user['email'] : null ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="celular">Celular:</label>
                            <input type="tel" class="form-control" id="celular" name="celular"
                            value="<?= ($id) ? $user['celular'] : null ?>">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                            value="<?= ($id) ? $user['data_nascimento'] : null ?>">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="cpf">CPF:</label>
                            <input type="tel" class="form-control" id="cpf" name="cpf"
                            value="<?= ($id) ? $user['cpf'] : null ?>">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="nivel_acesso" class="text-danger font-weight-bold">Nível de Acesso:</label>
                            <select class="form-control" id="nivel_acesso" name="nivel_acesso">
                                <option value=""> -- ESCOLHA -- </option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 1) ? "selected" : null ?>
                                value="1">Usuário</option>
                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                value="0">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="cep">CEP:</label>
                            <input type="text" class="form-control" id="cep" name="cep"
                            value="<?= ($id) ? $user['cep'] : null ?>">
                        </div>
                        <div class="form-group col-sm-7">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco"
                            value="<?= ($id) ? $user['endereco'] : null ?>">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="numero">Número:</label>
                            <input type="text" class="form-control" id="numero" name="numero"
                            value="<?= ($id) ? $user['numero'] : null ?>">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                            value="<?= ($id) ? $user['complemento'] : null ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade"
                            value="<?= ($id) ? $user['cidade'] : null ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="estado">Estado:</label>
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

                    <div class="form-row">
                        <div class="col-sm-6 form-group">
                            <label for="senha">Digite uma senha:</label>
                            <input type="password" name="senha" id="senha" class="form-control text-center" 
                            <?= (isset($_GET['id'])) ? null : "required" ?> >
                            
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="confirma_senha">Confirme sua senha:</label>
                            <input type="password" name="confirma_senha" id="confirma_senha" class="form-control text-center" 
                            <?= (isset($_GET['id'])) ? null : "" ?>>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <a href="/site-pi/dashboard.php" class="btn btn-link" id="btnBack">Voltar</a>
                        </div>
                        <div class="col text-center">
                            <button type="reset" class="btn btn-secondary" id="btnClear">Limpar</button>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn <?= $cor ?>">Salvar</button>
                        </div>
                    </div>



                </form>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
    </body>

</html>