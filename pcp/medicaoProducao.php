<?php
require '../utils/conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se veio um ID na URL e valida se é um inteiro
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$cor = ($id) ? "btn-warning" : "btn-success";

// Caso tenha um ID, busca o registro correspondente no banco de dados
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
            header("Location: ../pcp/index.php"); // Redireciona caso o ID não seja encontrado
            exit;
        }
    } else {
        die("Erro ao preparar a consulta: " . $conn->error);
    }
}

// Consulta geral para listar os registros no banco
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
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Acompanhamento da produção</title>
</head>
<header>
    <?php
    include_once('../utils/menu.php');
    ?>
</header>

<body>

    <div class="container mt-5">

        <div class="row">

            <a href="../pcp/index.php" class="btn">
                <div class="col-2 d-flex justify-content-left">
                    <div style="width: 18rem;">
                        <span class="fa fa-chevron-left fa-2x p-3" aria-hidden=" true"></span>
                    </div>
                </div>
            </a>
        </div>
        <div class="row">
            <div class="col m-5 d-flex justify-content-center">
                <h1>Medição da Produção</h1>
            </div>
        </div>
        <div class="form-group">
            <form action="../pcp/bd_pcp_medicao_prod.php" method="POST"><!-- Inicio Formulário -->

                <input type="hidden" id="id_medicao" name="id_medicao" value="<?= $user['id_medicao'] ?? null ?>">
                <input type="hidden" name="acao" id="acao" value="<?= $id ? "ALTERAR" : "INCLUIR" ?>">

                <!-- Nome, CPF e Data Nascimento -->
                <div class="form-row justify-content-center mt-2">
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

                            //teste
                            
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="dataMedicao">Data da medição</label>
                        <input type="date" class="form-control" id="dataMedicao" name="dataMedicao"
                            value="<?= $id ? $user['data_medicao'] : '' ?>">
                    </div>

                </div>

                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-4">
                        <label for="diametroFruto">Diâmetro da Fruta (cm)</label>
                        <input type="number" class="form-control" id="diametroFruto" name="diametroFruto"
                            value="<?= $id ? $user['diametro_fruto'] : '' ?>">
                    </div>

                    <div class="col-sm-4">
                        <label for="adubacao">Necessário adubação ?</label>
                        <select class="custom-select" id="adubacao" name="adubacao" required>
                            <option value="">Selecione</option>
                            <option <?= ($id && $user["adubacao"] == "Sim") ? "selected" : '' ?> value="Sim">Sim
                            </option>
                            <option <?= ($id && $user["adubacao"] == "Não") ? "selected" : '' ?> value="Não">Não
                            </option>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label for="praga">Alguma praga observada ?</label>
                        <select class="custom-select" id="praga" name="praga" required>
                            <option value="">Selecione</option>
                            <option <?= ($id && $user["praga"] == "Sim") ? "selected" : '' ?> value="Sim">Sim
                            </option>
                            <option <?= ($id && $user["praga"] == "Não") ? "selected" : '' ?> value="Não">Não
                            </option>
                        </select>
                    </div>

                </div>
                <div class="form-row justify-content-center mt-2">
                    <div class="col-6">
                        <label for="obsMedicao">Observação:</label>
                        <input type="text" class="form-control" id="obsMedicao" name="obsMedicao"
                            placeholder="Informar qual ciclo de adubação ou controle de pragas aplicar"
                            value="<?= $id ? $user['obs_medicao'] : '' ?>">
                    </div>
                </div>
        </div>

        <!-- Botões -->
        <div class="form-row d-flex justify-content-center">
            <div class="col-sm-3 mt-3 ">
                <button type="submit" name="submit" class="btn btn-success">Cadastrar</button>
            </div>
            <div class="col-sm-3 mt-3">
            </div>

            <div class="col-sm-3 mt-3">
                <button type="reset" class="btn btn-warning">Limpar</button>
            </div>

        </div>

        </form>

    </div>

    <?php
    // Obtém a menor data de medição para definir o início das etapas
    $sql_primeira_data = "SELECT MIN(data_medicao) as primeira_data FROM medicao_producao;";
    $result_primeira_data = $conn->query($sql_primeira_data);

    if ($result_primeira_data->num_rows > 0) {
        $primeira_data = $result_primeira_data->fetch_assoc()['primeira_data'];
        $data_inicio = new DateTime($primeira_data);
    } else {
        $data_inicio = null; // Caso não haja medições
    }

    // Função para calcular a etapa atual (1 a 5)
    function calcularEtapa($data_atual, $data_inicio)
    {
        $semanas_totais = 192;
        $etapas = 5;
        $semanas_por_etapa = ceil($semanas_totais / $etapas);

        $diff = $data_inicio->diff(new DateTime($data_atual));
        $semanas_passadas = floor($diff->days / 7);

        return min(ceil($semanas_passadas / $semanas_por_etapa), $etapas); // Garante no máximo a etapa 5
    }
    ?>

    <div class="container mt-5">
        <h2 class="d-flex justify-content-center">Medições realizadas</h2>
        <div class="card p-3">
            <table class="table table-striped table-light">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome Plantação</th>
                        <th>Data medição</th>
                        <th>Diametro do fruto</th>
                        <th>Necessário abudação?</th>
                        <th>Necessário Herbicida ou inseticida ?</th>
                        <th>Observação</th>
                        <th>Imagem ilustrativa</th>
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
                                <?php if ($data_inicio): ?>
                                    <?php
                                    $etapa = calcularEtapa($linha['data_medicao'], $data_inicio);
                                    $imagem_url = "../imgs/Nível_$etapa.png"; // Substitua pelo caminho real
                                    ?>
                                    <img src="<?= $imagem_url ?>" alt="Nível <?= $etapa ?>" width="120" height="120">
                                <?php else: ?>
                                    <span>Sem dados suficientes</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="medicaoProducao.php?id=<?= $linha['id_medicao'] ?>"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <button type="button" class="btn btn-danger btn-sm btn-excluir"
                                    data-id="<?= $linha['id_medicao'] ?>">Excluir</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>


    <script>
        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id'); // Obtém o ID do botão
                if (confirm('Tem certeza de que deseja excluir este registro?')) {
                    fetch('/pi_gandara/pcp/bd_pcp_medicao_prod.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `acao=DELETAR&id_medicao=${id}` // Certifique-se de que o nome corresponde ao esperado no PHP
                    })
                        .then(response => response.json()) // Converte a resposta para JSON
                        .then(data => {
                            alert(data.message); // Exibe a mensagem do backend
                            if (data.status === 'sucesso') location.reload(); // Recarrega a página se a exclusão for bem-sucedida
                        })
                        .catch(error => console.error('Erro na requisição:', error));
                }
            });
        });
    </script>
</body>

</html>