<?php
require '../utils/conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se veio um ID na URL e valida se é um inteiro
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$cor = ($id) ? "btn-warning" : "btn-success";

// Caso tenha um ID, busca o registro correspondente no banco de dados
if ($id) {
    $sql = "SELECT * FROM cadastro_insumo WHERE id_solicitacao_cad = ?;";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $dados = $stmt->get_result();

        if ($dados->num_rows > 0) {
            $user = $dados->fetch_assoc();
        } else {
            header("Location: ../pcp/index.php"); // Redireciona caso o ID não seja encontrado
            exit;
        }
    } else {
        die("Erro ao preparar a consulta: " . $conn->error);
    }
}

// Consulta geral para listar os registros no banco
$sql = "SELECT id_solicitacao_cad, nome_insumo, cod_ref, qtde_utilizada, unidade, prazo_util FROM cadastro_insumo;";
$stmt = $conn->prepare($sql);

/* `id` int(11) NOT NULL,
  `nome_insumo` varchar(100) DEFAULT NULL,
  `cod_ref` float DEFAULT NULL,
  `qtde_utilizada` int(11) DEFAULT NULL,
  `unidade` varchar(20) DEFAULT NULL,
  `prazo_util` date DEFAULT NULL
*/

if ($stmt) {
    $stmt->execute();
    $dados = $stmt->get_result();
} else {
    die("Erro ao preparar a consulta: " . $conn->error);
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/pi_gandara/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Trabalho Gandara!</title>
</head>
<header>
    <?php
    include_once('../utils/menu.php');
    ?>
</header>

<body>
    <div class="container">
        <div class="row">
            <div class="col m-5 d-flex justify-content-center">
                <h3>Solicitação de cadastro de Materiais</h3>
            </div>

        </div>


        <form action="../pcp/bd_pcp_solicitacao_cad.php" method="POST"><!-- Inicio Formulário -->


            <input type="hidden" id="id_agendamento" name="id_agendamento" value="<?= $idAgendamento ?? null ?>">
            <input type="hidden" name="acao" id="acao" value="<?= $id ? "ALTERAR" : "INCLUIR" ?>">

            <div class="form-group">
                <!-- Nome, CPF e Data Nascimento -->
                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-6">
                        <label for="nome_insumo">Nome do Insumo</label>
                        <input type="text" class="form-control" id="nome_insumo" name="nome_insumo"
                            value="<?= $id ? $user['nome_insumo'] : '' ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="cod_ref">Código de Referência</label>
                        <input type="text" class="form-control" id="cod_ref" name="cod_ref"
                            value="<?= $id ? $user['cod_ref'] : '' ?>">
                    </div>
                </div>

                <!-- Celular e Email -->

                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-4">
                        <label for="qtde_utilizada">Quantidade utilizada</label>
                        <input type="text" class="form-control" id="qtde_utilizada" name="qtde_utilizada"
                            value="<?= $id ? $user['qtde_utilizada'] : '' ?>">
                    </div>

                    <div class="col-sm-4">
                        <label for="unidade">Unidade:</label>
                        <div class="input-group">
                            <select class="custom-select" id="unidade" name="unidade">
                                <option value="">Selecione</option>
                                <option <?= ($id && $user["unidade"] == "Litro") ? "selected" : '' ?> value="Litro">Litro</option>
                                <option <?= ($id && $user["unidade"] == "Quilo") ? "selected" : '' ?> value="Quilo">Quilo</option>
                                <option <?= ($id && $user["unidade"] == "Tonelada") ? "selected" : '' ?> value="Tonelada">Tonelada</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="prazo_util">Data de Utilização</label>
                        <input type="date" class="form-control" id="prazo_util" name="prazo_util"
                            value="<?= $id ? $user['prazo_util'] : '' ?>">

                    </div>
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
                    <a href="index.php"><button type="button" class="btn btn-danger">Voltar</button></a>
                </div>
            </div>
        </form>

        <div class="container mt-5">
            <h2 class="d-flex justify-content-center">Cadastros solicitados</h2>
            <div class="card p-3">
                <table class="table table-striped table-light">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Insumo</th>
                            <th>Código Referência</th>
                            <th>Quantidade utilizada</th>
                            <th>Unidade de medida</th>
                            <th>Data de utilização</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($linha = $dados->fetch_assoc()): ?>
                            <tr>
                                <td><?= $linha['id_solicitacao_cad'] ?></td>
                                <td><?= $linha['nome_insumo'] ?></td>
                                <td><?= $linha['cod_ref'] ?></td>
                                <td><?= $linha['qtde_utilizada'] ?></td>
                                <td><?= $linha['unidade'] ?></td>
                                <td><?= $linha['prazo_util'] ?></td>
                                <a href="cadastroInsumo.php?id=<?= $linha['id_solicitacao_cad'] ?>"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <button type="button" class="btn btn-danger btn-sm"
                                    data-id="<?= $linha['id_solicitacao_cad'] ?>">Excluir</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>