<?php
require '../utils/conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if ($id) {
    $sql = "SELECT * FROM cad_expedicao WHERE id_expedicao=?;";
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

$sql = "SELECT * FROM cad_expedicao;";

$stmt = $conn->prepare($sql);

$stmt->execute();

$dados = $stmt->get_result();

//Prepara a consulta SQL da tabela de venda
$sql_venda = "SELECT id_venda FROM cad_vendas";
$stmt_venda = $conn->prepare($sql_venda);
$stmt_venda->execute();
$result_venda = $stmt_venda->get_result();

//Consulta Cliente
$sql_cliente = "SELECT nome FROM cad_cliente"; // Ajuste os campos conforme necessário
$stmt_cliente = $conn->prepare($sql_cliente);
$stmt_cliente->execute();
$result_cliente = $stmt_cliente->get_result();

//Consulta Transportadores
$sql_transportador = "SELECT nometransportador FROM cad_transportadores"; // Ajuste os campos conforme necessário
$stmt_transportador = $conn->prepare($sql_transportador);
$stmt_transportador->execute();
$result_transportador = $stmt_transportador->get_result();

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
            <h3 class="text-center">Agendamento de expedição de produto acabado</h3>
            <div class="card card-cds">
                <div class="card card-cds">
                    <form class="mt-3 mb-3 ml-3 mr-3" id="userform" action="../comercial/bd/bd-expedicao.php" method="POST">

                        <input type="hidden" id="id_expedicao" name="id_expedicao" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
                        <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">

                        <div class="form-row">
                            <div class="form-group col-md-2 text-white">
                                <label class="text-dark" for="id_venda"><b>Nº Venda</b></label>
                                <select id="id_venda" name="id_venda" class="form-control">
                                    <option value="" selected>-- ESCOLHA --</option>
                                    <?php
                                    while ($venda = $result_venda->fetch_assoc()) {
                                        $selectP = ($id && $user['id_venda'] == $venda['id_venda']) ? 'selected' : '';
                                        echo "<option value='{$venda['id_venda']}' $selectP>{$venda['id_venda']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4 text-white">
                                <label class="text-dark" for="nome"><b>Cliente</b></label>
                                <select id="nome" name="nome" class="form-control">
                                    <option value="" selected>-- ESCOLHA --</option>
                                    <?php
                                    while ($cliente = $result_cliente->fetch_assoc()) {
                                        $selectP = ($id && $user['nome'] == $cliente['nome']) ? 'selected' : '';
                                        echo "<option value='{$cliente['nome']}' $selectP>{$cliente['nome']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4 text-white">
                                <label class="text-dark" for="nometransportador"><b>Transportadora:</b></label>
                                <select id="nometransportador" name="nometransportador" class="form-control">
                                    <option value="" selected>-- ESCOLHA --</option>
                                    <?php
                                    while ($transportador = $result_transportador->fetch_assoc()) {
                                        $selectP = ($id && $user['nometransportador'] == $transportador['nometransportador']) ? 'selected' : '';
                                        echo "<option value='{$transportador['nometransportador']}' $selectP>{$transportador['nometransportador']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-2 text-white">
                                <label class="text-dark" for="dataenvio"><b>Data de Envio:</b></label>
                                <input type="date" class="form-control" id="dataenvio" name="dataenvio"
                                    value="<?= ($id) ? $user['dataenvio'] : null ?>">
                            </div>
                        </div> <!-- -->

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
                <h3 class="text-center">Pedidos agendados:</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Transportadora resp:</th>
                                <th scope="col">Data de envio</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Aqui adicionamos o laço de repetição que irá exibir uma linha da tabela para cada registro no BD.
                            // Adiciona cada registro na variavel linha como um array. 
                            while ($linha = $dados->fetch_assoc()) {

                            ?>
                                <tr>
                                    <td><?= $linha['id_venda'] ?></td>
                                    <td><?= $linha['nome'] ?></td>
                                    <td><?= $linha['nometransportador'] ?></td>
                                    <td><?= $linha['dataenvio'] ?></td>
                                    <td>
                                        <!-- Chamo a pagina de formulario e envio o id do usuario que sera alterado. -->
                                        <a href="Expedicao.php?id=<?= $linha['id_expedicao'] ?>" class="btn btn-warning">Editar</a>

                                        <button class="btn btn-danger btn-excluir"
                                            data-table="cad_expedicao" data-id="<?= $linha['id_expedicao'] ?>"> Excluir</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</body>

</html>