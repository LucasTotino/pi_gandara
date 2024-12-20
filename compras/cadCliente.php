<?php
require '../utils/conexao.php';
// Verifica se veio um id na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";
// Caso tenha um ID faz A busca do Usuario no BD
if ($id) {
    $sql = "SELECT * FROM cad_cliente WHERE id=?;";
    $stmt = $conn->prepare($sql);
    // Troca o ? pelo ID que veio na URL
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $dados = $stmt->get_result();

    // Verifica se encontrou o usuario ou se ele existe no BD
    if ($dados->num_rows > 0) {
        // Coloca os dados do usuário em uma variavel como array
        $cliente = $dados->fetch_assoc();
    } else {
        // Se não encontrou um usuario retorna para a página anterior.
?>

        <script>
            history.back();
        </script>
<?php
    }
}

// Prepara a consulta SQL
$sql = "SELECT * FROM cad_cliente;";

// Envia o SQL para o Prepare Statement:
$stmt = $conn->prepare($sql);

//Executa a consulta SQL
$stmt->execute();

//Pega o resultado e adiciona em uma variavel
$dados = $stmt->get_result();

$nivel = array(
    'Pessoa Juridica', // Posição 0
    'Pessoa Fisica' //Posição 1
);
$corNivel = array(
    'badge-danger', // Posição 0
    'badge-primary' // Posição 1
);

$tipo = isset($_GET['tipo_cliente']) && !empty($_GET['tipo_cliente']) ? $_GET['tipo_cliente'] : 1;

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
                <form class="mt-3 mb-3 ml-3 mr-3" action="/pi_gandara/compras/bd/bd_cliente.php" method="POST"><!-- Inicio Formulário -->
                    <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
                    <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
                    <div class="form-group ">
                        <!-- Nome, CPF -->
                        <div class="form-row justify-content-center mt-2">
                            <div class="col-sm-8">
                                <label for="nome">Nome </label>
                                <input type="text" class="form-control" id="nome" name="nome" required
                                    value="<?= ($id) ? $cliente['nome'] : null ?>">
                            </div>
                            <div class="col-sm-4">
                                <label for="cpf_cnpj">CPF/CNPJ</label>
                                <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" maxlength="18"
                                    value="<?= ($id) ? $cliente['cpf_cnpj'] : null ?>">
                            </div>
                        </div>

                        <!-- Tipo de Cliente e Dados de Contato -->
                        <div class="form-row justify-content-center mt-2">
                            <div class="form-group col-sm-3">
                                <label for="tipo_cliente" class="text-danger font-weight-bold">Tipo de Cliente:</label>
                                <select class="form-control" id="tipo_cliente" name="tipo_cliente" onchange="aplicaMascara()">
                                    <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $cliente['tipo_cliente'] == 1) ? "selected" : null ?>
                                        value="1">Pessoa Física</option>
                                    <option <?= (isset($_GET['id']) && $cliente['tipo_cliente'] == 0) ? "selected" : null ?>
                                        value="0">Pessoa Jurídica</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" autocomplete="on"
                                    value="<?= ($id) ? $cliente['email'] : null ?>">
                            </div>
                            <div class="col-sm-3">
                                <label for="celular">Celular</label>
                                <input type="celular" class="form-control" id="celular" name="celular" maxlength="15"
                                    value="<?= ($id) ? $cliente['celular'] : null ?>" onkeypress="mascara('(##) #####-####', this)">
                            </div>
                        </div>

                        <hr>

                        <!-- Endereço -->

                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-8">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control" id="logradouro" name="logradouro"
                                    value="<?= ($id) ? $cliente['logradouro'] : null ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="numero">Número</label>
                                <input type="number" class="form-control" id="numero" name="numero"
                                    value="<?= ($id) ? $cliente['numero'] : null ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="complemento">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento"
                                    value="<?= ($id) ? $cliente['complemento'] : null ?>">
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-3">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro"
                                    value="<?= ($id) ? $cliente['bairro'] : null ?>">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control" id="cidade" name="cidade"
                                    value="<?= ($id) ? $cliente['cidade'] : null ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="estado">Estado</label>
                                <div class="input-group">
                                    <select class="form-control" id="estado" name="estado">
                                        <option value=""> -- ESCOLHA -- </option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "AC") ? "selected" : null ?> value="AC">Acre</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "AL") ? "selected" : null ?> value="AL">Alagoas</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "AP") ? "selected" : null ?> value="AP">Amapá</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "AM") ? "selected" : null ?> value="AM">Amazonas</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "BA") ? "selected" : null ?> value="BA">Bahia</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "CE") ? "selected" : null ?> value="CE">Ceará</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "DF") ? "selected" : null ?> value="DF">Distrito Federal</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "ES") ? "selected" : null ?> value="ES">Espírito Santo</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "GO") ? "selected" : null ?> value="GO">Goiás</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "MA") ? "selected" : null ?> value="MA">Maranhão</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "MT") ? "selected" : null ?> value="MT">Mato Grosso</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "MS") ? "selected" : null ?> value="MS">Mato Grosso do Sul</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "MG") ? "selected" : null ?> value="MG">Minas Gerais</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "PA") ? "selected" : null ?> value="PA">Pará</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "PB") ? "selected" : null ?> value="PB">Paraíba</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "PR") ? "selected" : null ?> value="PR">Paraná</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "PE") ? "selected" : null ?> value="PE">Pernambuco</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "PI") ? "selected" : null ?> value="PI">Piauí</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "RJ") ? "selected" : null ?> value="RJ">Rio de Janeiro</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "RN") ? "selected" : null ?> value="RN">Rio Grande do Norte</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "RS") ? "selected" : null ?> value="RS">Rio Grande do Sul</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "RO") ? "selected" : null ?> value="RO">Rondônia</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "RR") ? "selected" : null ?> value="RR">Roraima</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "SC") ? "selected" : null ?> value="SC">Santa Catarina</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "SP") ? "selected" : null ?> value="SP">São Paulo</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "SE") ? "selected" : null ?> value="SE">Sergipe</option>
                                        <option <?= (isset($_GET['id']) && $cliente['estado'] == "TO") ? "selected" : null ?> value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="cep">CEP:</label>
                                <input type="text" class="form-control" id="cep" name="cep"
                                    value="<?= ($id) ? $cliente['cep'] : null ?>" maxlength="9" onkeypress="mascara('#####-###', this)">
                            </div>
                        </div>

                        <hr>
                        
                        <div class="form-row mt-3">
                            <div class="col-md-4 text-left">
                                <a class="btn btn-warning" href="../comercial/index.php">Voltar</a>
                            </div>
                            <div class="col-md-4 text-center">
                                <button type="reset" class="btn btn-outline-secondary">Limpar</button>
                            </div>
                            <div class="col-md-4 text-right">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                        </div> <!-- BOTÕES -->
                    </div>
                </form>
            </div>
        </div>

        <div class="container mt-3">
            <div class="card">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Nivel</th>
                        <th>Editar</th>
                    </thead>
                    <tbody>
                        <?php
                        // Aqui adicionamos o laço de repetição
                        // Que irá exibir uma linha da tabela para cada registro no bd

                        while ($linha = $dados->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?= $linha['nome'] ?></td>
                                <td><?= $linha['email'] ?></td>
                                <td><?= $linha['celular'] ?></td>
                                <td>
                                    <span class="badge <?= $corNivel[$linha['tipo_cliente']] ?>">
                                        <?= $nivel[$linha['tipo_cliente']] ?>
                                    </span>
                                </td>
                                <td>
                                    <!-- Chamo a página do formulario e envio o Id do usuario que será alterado-->
                                    <a href="cadCliente.php?id=<?= $linha['id'] ?>" class="btn btn-warning">Editar</a>
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
    <script src="../js/script.js"></script>
    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
        function aplicarMascara() {
            const tipoCliente = document.getElementById('tipo_cliente').value;
            const cpfCnpjInput = document.getElementById('cpf_cnpj');

            // Define a máscara com base na seleção
            if (tipoCliente == '1') { // Pessoa Física
                cpfCnpjInput.setAttribute('maxlength', '14');
                cpfCnpjInput.setAttribute('oninput', "mascara('###.###.###-##', this)");
            } else if (tipoCliente == '0') { // Pessoa Jurídica
                cpfCnpjInput.setAttribute('maxlength', '18');
                cpfCnpjInput.setAttribute('oninput', "mascara('##.###.###/####-##', this)");
            } else {
                cpfCnpjInput.removeAttribute('oninput');
            }
        }
    </script>
</body>

</html>