<?php
require '../utils/conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if ($id) {
    $sql = "SELECT * FROM cad_nfse WHERE id_nfse=?;";
    $stmt = $conn->prepare($sql);


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
}

$sql = "SELECT * FROM cad_nfse;";

$stmt = $conn->prepare($sql);
$stmt->execute();
$dados = $stmt->get_result();


?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/pi_gandara/css/style.css">

    <title>Comercial e Faturamento</title>
</head>


<body>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>
    <main>
        <h1 class="text-center">COMERCIAL E FATURAMENTO</h1>
        <div class="container">
            <h3 class="text-center">Saida de Nota Fiscal Eletronica</h3>
            <div class="card card-cds">
                <form class="mt-3 mb-3 ml-3 mr-3" id="userform" action="../comercial/bd/bd-cadnotasaida.php" method="POST">

                    <input type="hidden" id="id_nfse" name="id_nfse" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
                    <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">

                    <h3>Identificação NFSE:</h3>
                    <div class="form-row">
                        <div class="form-group col-md-3 text-white">
                            <label class="text-dark"><b>Tipo de Operação:</b></label>
                            <input type="text" class="form-control" readonly value="Saida">
                        </div>
                        <div class="form-group col-md-3 text-white">
                            <label class="text-dark" for=""><b>Nº da Nota:</b></label>
                            <input type="text" class="form-control" id="" name="" readonly
                                value="<?= ($id) ? $user['id_nfse'] : null ?>">
                        </div>
                        <div class="form-group col-md-3 text-white">
                            <label class="text-dark"><b>UF:</b></label>
                            <input type="text" class="form-control" value="São Paulo" readonly>
                        </div>
                        <div class="form-group col-md-3 text-white">
                            <label class="text-dark" for="dataemissao"><b>Data de Emissão:</b></label>
                            <input type="date" class="form-control" id="dataemissao" name="dataemissao"
                                value="<?= ($id) ? $user['dataemissao'] : null ?>">
                        </div>
                    </div> <!-- Linha 1 -->

                    <hr>
                    <h3>Identificação do Destinatário:</h3>

                    <div class="form-row">
                        <div class="form-group col-md-3 text-white">
                            <label class="text-dark" for="cpf_cnpj"><b>CPF/CNPJ:</b></label>
                            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj"
                                value="<?= ($id) ? $user['cpf_cnpj'] : null ?>" readonly>
                        </div>
                        <div class="form-group col-md-6 text-white">
                            <label class="text-dark" for="nome"><b>Nome/Razão Social:</b></label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?= ($id) ? $user['nome'] : null ?>">
                        </div>
                        <div class="form-group col-md-3 text-white">
                            <label class="text-dark" for="estado"><b>Estado:</b></label>
                            <input type="text" class="form-control" id="estado" name="estado"
                                value="<?= ($id) ? $user['estado'] : null ?>" readonly>
                        </div>
                    </div> <!-- Linha 2 -->

                    <div class="form-row">
                        <div class="form-group col-md-6 text-white">
                            <label class="text-dark" for="logradouro"><b>Logradouro:</b></label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro"
                                value="<?= ($id) ? $user['logradouro'] : null ?>" readonly>
                        </div>
                        <div class="form-group col-md-3 text-white">
                            <label class="text-dark" for="email"><b>Contato:</b></label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= ($id) ? $user['email'] : null ?>" readonly>
                        </div>
                        <div class="form-group col-md-3 text-white">
                            <label class="text-dark" for="complemento"><b>Complemento:</b></label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                value="<?= ($id) ? $user['complemento'] : null ?>" readonly>
                        </div>
                    </div>

                    <hr>
                    <h3>Detalhes do Produto:</h3>

                    <div class="form-row">
                        <div class="form-group col-md-2 text-white">
                            <label class="text-dark" for="id"><b>Cod. Venda:</b></label>
                            <input type="text" class="form-control" id="id" name="id"
                                value="<?= ($id) ? $user['id'] : null ?>">
                        </div>
                        <div class="form-group col-md-4 text-white">
                            <label class="text-dark" for="produto"><b>Produto Vendido:</b></label>
                            <input type="text" class="form-control" id="produto" name="produto"
                                value="<?= ($id) ? $user['produto'] : null ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 text-white">
                            <label class="text-dark" for="quantidade"><b>Quantidade:</b></label>
                            <input type="text" class="form-control" id="quantidade" name="quantidade"
                                value="<?= ($id) ? $user['quantidade'] : null ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 text-white">
                            <label class="text-dark" for="valor"><b>Valor p/ Unidade:</b></label>
                            <input type="text" class="form-control" id="valor" name="valor"
                                value="<?= ($id) ? $user['valor'] : null ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 text-white">
                            <label class="text-dark" for=""><b>Total:</b></label>
                            <input type="text" class="form-control" id="" name=""
                                value="<?= ($id) ? $user['valortotal'] : null ?>" readonly>
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

                </form> <!-- End Form -->
            </div>
            <hr>

            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nº Nota</th>
                            <th scope="col">CPF/CNPJ</th>
                            <th scope="col">Nome/Razão Social</th>
                            <th scope="col">Data Emissão</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Valor Total</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Aqui adicionamos o laço de repetição que irá exibir uma linha da tabela para cada registro no BD.
                        // Adiciona cada registro na variavel linha como um array. 
                        while ($linha = $dados->fetch_assoc()) {

                        ?>
                            <tr>
                                <td><?= $linha['id_nfse'] ?></td>
                                <td><?= $linha['cpf_cnpj'] ?></td>
                                <td><?= $linha['nome'] ?></td>
                                <td><?= $linha['dataemissao'] ?></td>
                                <td><?= $linha['estado'] ?></td>
                                <td><?= $linha['valortotal'] ?></td>
                                <td><!-- Chamo a pagina de formulario e envio o id do usuario que sera alterado. -->
                                    <a href="cadNotaSaida.php?id=<?= $linha['id_nfse'] ?>" class="btn btn-warning">Editar</a>

                                    <button class="btn btn-danger btn-excluir"
                                        data-table="cad_nfse" data-id="<?= $linha['id_nfse'] ?>"> Excluir</button>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</body>

</html>