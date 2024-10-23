<?php
require '../utils/conexao.php';
// Verifica se veio um id na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";
// Caso tenha um ID faz A busca do Fornecedor no BD
if ($id) {
    $sql = "SELECT * FROM cad_fornecedor WHERE id=?;";
    $stmt = $conn->prepare($sql);
    // Troca o ? pelo ID que veio na URL
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $dados = $stmt->get_result();

    // Verifica se encontrou o Fornecedor ou se ele existe no BD
    if ($dados->num_rows > 0) {
        // Coloca os dados do usuário em uma variavel como array
        $fornecedor = $dados->fetch_assoc();
    } else {
        // Se não encontrou um Fornecedor retorna para a página anterior.
?>

        <script>
            history.back();
        </script>
<?php
    }
}

// Prepara a consulta SQL
$sql = "SELECT * FROM cad_fornecedor;";

// Seleciona apenas os campos que serão usados
$sql_eficiente = " SELECT id, nome, email, cpf_cnpj, celular, tipo_fornecedor FROM cad_fornecedor;";

// Envia o SQL para o Prepare Statement:
$stmt = $conn->prepare($sql);

//Executa a consulta SQL
$stmt->execute();

//Pega o resultado e adiciona em uma variavel
$dados = $stmt->get_result();

/* Caso use o SQL Eficiente: 
Liga os resultados a variáveis para serem utilizadas no HTML
*/
$nivel = array(
    'Pessoa Juridica', // Posição 0
    'Pessoa Fisica' //Posição 1
);
$corNivel = array(
    'badge-danger', // Posição 0
    'badge-primary' // Posição 1
)
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/pi_gandara/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Cadastro de Fornecedoress</title>
</head>

<body>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>

    <main>
        <h1 style="text-align:center;">Cadastro de Fornecedores</h1>


        <div class="container">
            <div class="card card-cds">
                <form class="mt-3 mb-3 ml-3 mr-3" action="/pi_gandara/compras/bd/bd_fornecedor.php" method="POST"><!-- Inicio Formulário -->
                <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
                    <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">    
                <div class="form-group ">
                        <!-- Nome, CPF -->
                        <div class="form-row justify-content-center mt-2">
                            <div class="col-sm-8">
                                <label for="nome">Nome </label>
                                <input type="text" class="form-control" id="nome" name="nome" required
                                    value="<?= ($id) ? $fornecedor['nome'] : null ?>">
                            </div>
                            <div class="col-sm-4">
                                <label for="cpf_cnpj">CPF/CNPJ</label>
                                <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" maxlength="18"
                                    value="<?= ($id) ? $fornecedor['cpf_cnpj'] : null ?>">
                            </div>
                        </div>

                        <!-- Tipo de Fornecedor e Dados de Contato -->
                        <div class="form-row justify-content-center mt-2">
                            <div class="form-group col-sm-3">
                                <label for="tipo_fornecedor" class="text-danger font-weight-bold">Tipo de Fornecedor:</label>
                                <select class="form-control" id="tipo_fornecedor" name="tipo_fornecedor">
                                    <option value=""> -- ESCOLHA -- </option>
                                    <option <?= (isset($_GET['id']) && $fornecedor['tipo_fornecedor'] == 1) ? "selected" : null ?>
                                        value="1">Pessoa Física</option>
                                    <option <?= (isset($_GET['id']) && $fornecedor['tipo_fornecedor'] == 0) ? "selected" : null ?>
                                        value="0">Pessoa Jurídica</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" autocomplete="on"
                                    value="<?= ($id) ? $fornecedor['email'] : null ?>">
                            </div>
                            <div class="col-sm-3">
                                <label for="celular">Celular</label>
                                <input type="celular" class="form-control" id="celular" name="celular" maxlength="15"
                                    value="<?= ($id) ? $fornecedor['celular'] : null ?>">
                            </div>
                        </div>

                        <hr>

                        <!-- Endereço -->

                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-8">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control" id="logradouro" name="logradouro"
                                    value="<?= ($id) ? $fornecedor['logradouro'] : null ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="numero">Número</label>
                                <input type="number" class="form-control" id="numero" name="numero"
                                    value="<?= ($id) ? $fornecedor['numero'] : null ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="complemento">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento"
                                    value="<?= ($id) ? $fornecedor['complemento'] : null ?>">
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-3">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro"
                                    value="<?= ($id) ? $fornecedor['bairro'] : null ?>">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control" id="cidade" name="cidade"
                                    value="<?= ($id) ? $fornecedor['cidade'] : null ?>">
                            </div>
                            <div class="col-sm-2">
                                <label for="estado">Estado</label>
                                <div class="input-group">
                                    <select class="form-control" id="estado" name="estado">
                                        <option value=""> -- ESCOLHA -- </option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "AC") ? "selected" : null ?> value="AC">Acre</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "AL") ? "selected" : null ?> value="AL">Alagoas</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "AP") ? "selected" : null ?> value="AP">Amapá</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "AM") ? "selected" : null ?> value="AM">Amazonas</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "BA") ? "selected" : null ?> value="BA">Bahia</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "CE") ? "selected" : null ?> value="CE">Ceará</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "DF") ? "selected" : null ?> value="DF">Distrito Federal</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "ES") ? "selected" : null ?> value="ES">Espírito Santo</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "GO") ? "selected" : null ?> value="GO">Goiás</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "MA") ? "selected" : null ?> value="MA">Maranhão</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "MT") ? "selected" : null ?> value="MT">Mato Grosso</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "MS") ? "selected" : null ?> value="MS">Mato Grosso do Sul</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "MG") ? "selected" : null ?> value="MG">Minas Gerais</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "PA") ? "selected" : null ?> value="PA">Pará</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "PB") ? "selected" : null ?> value="PB">Paraíba</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "PR") ? "selected" : null ?> value="PR">Paraná</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "PE") ? "selected" : null ?> value="PE">Pernambuco</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "PI") ? "selected" : null ?> value="PI">Piauí</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "RJ") ? "selected" : null ?> value="RJ">Rio de Janeiro</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "RN") ? "selected" : null ?> value="RN">Rio Grande do Norte</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "RS") ? "selected" : null ?> value="RS">Rio Grande do Sul</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "RO") ? "selected" : null ?> value="RO">Rondônia</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "RR") ? "selected" : null ?> value="RR">Roraima</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "SC") ? "selected" : null ?> value="SC">Santa Catarina</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "SP") ? "selected" : null ?> value="SP">São Paulo</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "SE") ? "selected" : null ?> value="SE">Sergipe</option>
                                        <option <?= (isset($_GET['id']) && $fornecedor['estado'] == "TO") ? "selected" : null ?> value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="cep">CEP:</label>
                                <input type="text" class="form-control" id="cep" name="cep"
                                    value="<?= ($id) ? $fornecedor['cep'] : null ?>">
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

        <div class="container mt-3">
            <div class="card">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>CELULAR</th>
                        <th>NÍVEL</th>
                        <th>AÇÕES</th>
                    </thead>
                    <tbody>
                        <?php
                        // Laço de repetição
                        // Que irá exibir uma linha da tabela para cada registro no bd
                        // Adiciona cada registro na variavel linha como um Arrey.
                        while ($linha = $dados->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?= $linha['nome'] ?></td>
                                <td><?= $linha['email'] ?></td>
                                <td><?= $linha['cpf'] ?></td>
                                <td>
                                    <span class="badge <?= $corNivel[$linha['tipo_fornecedor']] ?>">
                                        <?= $nivel[$linha['tipo_fornecedor']] ?>
                                    </span>
                                </td>
                                <td>
                                    <!-- Chamo a página do formulario e envio o Id do Fornecedor que será alterado-->
                                    <a href="cadFornecedor.php?id=<?= $linha['id'] ?>" class="btn btn-warning">Editar</a>
                                    <button class="btn btn-danger btn-excluir" data-table="cad_fornecedor" data-id="<?= $linha['id'] ?>">Excluir</button>
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
    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.btn-excluir').click(function() {
                var agenteId = $(this).data('id');
                var tabela = $(this).data('table');
                
                var confirma = confirm(`Você tem certeza que 
                deseja excluir o Agente [ ${agenteId} ] ?`);

                if (confirma) {
                    $.ajax({
                        url: `../bd/bd-${tabela}.php`,
                        type: 'POST',
                        data: {
                            acao: "DELETAR",
                            id_agente: agenteId
                        },
                        success: function(response) {
                            var result = JSON.parse(response);
                            if (result.status === "sucesso") {
                                alert(result.message);
                                location.reload();
                            } else {
                                alert(result.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr);
                            alert("Ocorreu um erro: " + error);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>