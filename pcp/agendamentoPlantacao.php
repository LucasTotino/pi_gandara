<?php
require '../utils/conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se veio um ID na URL e valida se é um inteiro
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$cor = ($id) ? "btn-warning" : "btn-success";

// Caso tenha um ID, busca o registro correspondente no banco de dados
if ($id) {
    $sql = "SELECT * FROM agendamento_plantacao WHERE id_agendamento = ?;";
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
$sql = "SELECT id_agendamento, nome_plantio, area_plantio, data_plantio, data_colheita, espacamento_mudas, fruto FROM agendamento_plantacao;";
$stmt = $conn->prepare($sql);

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
    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
    <title>Trabalho Gandara!</title>
</head>

<header>
    <?php include_once('../utils/menu.php'); ?>
</header>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col m-5 d-flex justify-content-center">
                <h1>Agendamento de um novo Plantio</h1>
            </div>
        </div>
        <form action="../pcp/bd_pcp_agendamento_plantacao.php" method="POST">
            <input type="hidden" id="id_agendamento" name="id_agendamento" value="<?= $idAgendamento ?? null ?>">
            <input type="hidden" name="acao" id="acao" value="<?= $id ? "ALTERAR" : "INCLUIR" ?>">

            <div class="form-group">
                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-4">
                        <label for="nomePlantio">Nome da área de plantio</label>
                        <input type="text" name="nome_plantio" id="nomePlantio" class="form-control"
                            value="<?= $id ? $user['nome_plantio'] : '' ?>">
                    </div>
                    <div class="col-sm-2">
                        <label for="areaPlantio">Área de plantio (ha)</label>
                        <input type="number" class="form-control" id="areaPlantio" name="area_plantio"
                            value="<?= $id ? $user['area_plantio'] : '' ?>">
                    </div>
                    <div class="col-sm-3">
                        <label for="dataPlantio">Data estimada para plantio</label>
                        <input type="date" class="form-control" id="dataPlantio" name="data_plantio"
                            value="<?= $id ? $user['data_plantio'] : '' ?>">
                    </div>
                    <div class="col-sm-3">
                        <label for="dataColheita">Data estimada para Colheita</label>
                        <input type="date" class="form-control" id="dataColheita" name="data_colheita"
                            value="<?= $id ? $user['data_colheita'] : '' ?>">
                    </div>
                </div>

                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-4">
                        <label for="espacoMuda">Espaçamento entre Mudas (m)</label>
                        <input type="number" class="form-control" id="espacoMuda" name="espacamento_mudas"
                            value="<?= $id ? $user['espacamento_mudas'] : '' ?>">
                    </div>
                    <div class="col-sm-4">
                        <label for="fruto">Fruto:</label>
                        <select class="custom-select" id="fruto" name="fruto" required>
                            <option value="">Selecione</option>
                            <option <?= ($id && $user["fruto"] == "Laranja") ? "selected" : '' ?> value="Laranja">Laranja
                            </option>
                            <option <?= ($id && $user["fruto"] == "Limão") ? "selected" : '' ?> value="Limão">Limão
                            </option>
                        </select>
                    </div>
                </div>
            </div>

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
    </div>

    <div class="container mt-5">
        <h2 class="d-flex justify-content-center">Plantações agendadas</h2>
        <div class="card p-3">
            <table class="table table-striped table-light">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome Plantação</th>
                        <th>Área (ha)</th>
                        <th>Data Plantio</th>
                        <th>Data Colheita</th>
                        <th>Espaçamento</th>
                        <th>Fruto</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($linha = $dados->fetch_assoc()): ?>
                        <tr>
                            <td><?= $linha['id_agendamento'] ?></td>
                            <td><?= $linha['nome_plantio'] ?></td>
                            <td><?= $linha['area_plantio'] ?></td>
                            <td><?= $linha['data_plantio'] ?></td>
                            <td><?= $linha['data_colheita'] ?></td>
                            <td><?= $linha['espacamento_mudas'] ?></td>
                            <td><?= $linha['fruto'] ?></td>
                            <td>
                                <a href="agendamentoPlantacao.php?id=<?= $linha['id_agendamento'] ?>"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <button type="button" class="btn btn-danger btn-sm"
                                    data-id="<?= $linha['id_agendamento'] ?>">Excluir</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>