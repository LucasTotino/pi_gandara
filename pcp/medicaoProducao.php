<?php
require '../utils/conexao.php'; // Inclui o arquivo de conexão com o banco de dados

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$cor = ($id) ? "btn-warning" : "btn-success";

if ($id) {
    $sql = "SELECT * FROM medicao_producao WHERE id_medicao = ?;";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $dados = $stmt->get_result();

        if ($dados->num_rows > 0) {
            $user = $dados->fetch_assoc();
        } else {
            header("Location: ../pcp/index.php");
            exit;
        }
    } else {
        die("Erro ao preparar a consulta: " . $conn->error);
    }
}

$sql = "SELECT id_medicao, id_nome_plantio, data_medicao, diametro_fruto, adubacao, praga, obs_medicao FROM medicao_producao;";
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
    <title>Medição da Produção</title>
</head>

<body>
    <?php include_once('../utils/menu.php'); ?>

    <div class="container mt-5">
        <h1 class="text-center">Medição da Produção</h1>
        <form action="../pcp/bd_pcp_medicao_prod.php" method="POST">
            <input type="hidden" id="id_medicao" name="id_medicao" value="<?= $user['id_medicao'] ?? null ?>">
            <input type="hidden" name="acao" id="acao" value="<?= $id ? "ALTERAR" : "INCLUIR" ?>">

            <div class="form-row mt-3">
                <div class="col-sm-6">
                    <label for="id_nome_plantio">Item</label>
                    <select name="id_nome_plantio" id="id_nome_plantio" class="form-control">
                        <option value="">Selecione um item</option>
                        <?php
                        $sql = "SELECT id_agendamento, nome_plantio FROM agendamento_plantacao";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            $selected = ($id && $row['nome_plantio'] == $user['id_nome_plantio']) ? 'selected' : '';
                            echo "<option value='{$row['nome_plantio']}' $selected>{$row['nome_plantio']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="dataMedicao">Data da medição</label>
                    <input type="date" class="form-control" id="dataMedicao" name="dataMedicao"
                        value="<?= $id ? $user['data_medicao'] : '' ?>">
                </div>
            </div>

            <div class="form-row mt-3">
                <div class="col-sm-4">
                    <label for="diametroFruto">Diâmetro da Fruta (cm)</label>
                    <input type="number" class="form-control" id="diametroFruto" name="diametroFruto"
                        value="<?= $id ? $user['diametro_fruto'] : '' ?>">
                </div>
                <div class="col-sm-4">
                    <label for="adubacao">Necessário adubação?</label>
                    <select class="form-control" id="adubacao" name="adubacao">
                        <option value="">Selecione</option>
                        <option <?= ($id && $user["adubacao"] == "Sim") ? "selected" : '' ?> value="Sim">Sim</option>
                        <option <?= ($id && $user["adubacao"] == "Não") ? "selected" : '' ?> value="Não">Não</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="praga">Alguma praga observada?</label>
                    <select class="form-control" id="praga" name="praga">
                        <option value="">Selecione</option>
                        <option <?= ($id && $user["praga"] == "Sim") ? "selected" : '' ?> value="Sim">Sim</option>
                        <option <?= ($id && $user["praga"] == "Não") ? "selected" : '' ?> value="Não">Não</option>
                    </select>
                </div>
            </div>

            <div class="form-row mt-3">
                <div class="col-sm-12">
                    <label for="obsMedicao">Observação:</label>
                    <input type="text" class="form-control" id="obsMedicao" name="obsMedicao"
                        value="<?= $id ? $user['obs_medicao'] : '' ?>">
                </div>
            </div>

            <div class="form-row mt-4 text-center">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
                <div class="col-sm-4">
                    <button type="reset" class="btn btn-warning">Cancelar</button>
                </div>
                <div class="col-sm-4">
                    <a href="index.php" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>

    <div class="container mt-5">
        <h2 class="d-flex justify-content-center">Medições Realizadas</h2>
        <div class="card p-3">
            <table class="table table-striped table-light">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Plantação</th>
                        <th>Data</th>
                        <th>Diâmetro</th>
                        <th>Adubação</th>
                        <th>Pragas</th>
                        <th>Observação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($linha = $dados->fetch_assoc()): ?>
                        <tr>
                            <td><?= $linha['id_medicao'] ?></td>
                            <td><?= $linha['id_nome_plantio'] ?></td>
                            <td><?= $linha['data_medicao'] ?></td>
                            <td><?= $linha['diametro_fruto'] ?></td>
                            <td><?= $linha['adubacao'] ?></td>
                            <td><?= $linha['praga'] ?></td>
                            <td><?= $linha['obs_medicao'] ?></td>
                            <td>
                                <a href="medicaoProducao.php?id=<?= $linha['id_medicao'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <button class="btn btn-danger btn-sm" data-id="<?= $linha['id_medicao'] ?>">Excluir</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                if (confirm('Tem certeza de que deseja excluir este registro?')) {
                    fetch('/pi_gandara/pcp/bd_pcp_medicao_prod.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `acao=DELETAR&id=${id}`
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert(data.message);
                            if (data.status === 'sucesso') location.reload();
                        });
                }
            });
        });
    </script>
</body>

</html>