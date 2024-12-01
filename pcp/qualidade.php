<?php
require '../utils/conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se veio um ID na URL para edição
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$cor = ($id) ? "btn-warning" : "btn-success";

// Caso tenha um ID, busca o registro correspondente no banco de dados
if ($id) {
  $sql = "SELECT * FROM qualidade WHERE id_qualidade = ?;";
  $stmt = $conn->prepare($sql);

  if ($stmt) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $dados = $stmt->get_result();

    if ($dados->num_rows > 0) {
      $user = $dados->fetch_assoc();
    } else {
      header("Location: index.php"); // Redireciona caso o ID não seja encontrado
      exit;
    }
  } else {
    die("Erro ao preparar a consulta: " . $conn->error);
  }
}

// Consulta geral para listar os registros no banco
$sql = "SELECT id_qualidade, nome_plantio, data_medicao, diametro_med, conformidade_venda FROM qualidade;";
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
    <form action="../pcp/bd_pcp_qualidade.php" method="POST">
      <input type="hidden" id="id_qualidade" name="id_qualidade" value="<?= $id ?? null ?>">
      <input type="hidden" name="acao" id="acao" value="<?= $id ? "ALTERAR" : "INCLUIR" ?>">

      <div class="row">
        <a href="../pcp/index.php" class="btn">
          <div class="col-2">
            <div style="width: 18rem;">
              <span class="fa fa-chevron-left fa-2x p-3" aria-hidden="true"></span>
            </div>
          </div>
        </a>

        <div class="col-6 m-5">
          <h1>Registro de Qualidade</h1>
        </div>
      </div>



      <div class="form-group">


        <div class="form-row justify-content-center mt-2">
          <div class="col-sm-6">
            <label for="nome_plantio">Item</label>
            <select name="nome_plantio" id="nome_plantio" class="form-control">
              <option value="">Selecione um item</option>
              <?php
              $sql = "SELECT id_agendamento, nome_plantio FROM agendamento_plantacao";
              $result = $conn->query($sql);

              while ($row = $result->fetch_assoc()) {
                $selected = ($id && $row['nome_plantio'] == $user['nome_plantio']) ? 'selected' : '';
                echo "<option value='{$row['nome_plantio']}' $selected>{$row['nome_plantio']}</option>";
              }

              ?>
            </select>
          </div>

          <div class="col-sm-6">
            <label for="data_medicao">Data da medição</label>
            <input type="date" class="form-control" id="data_medicao" name="data_medicao"
              value="<?= $id ? $user['data_medicao'] : '' ?>">
          </div>
        </div>

        <div class="form-row justify-content-center mt-2">
          <div class="col-sm-4">
            <label for="diametro_med">Diâmetro da Fruta (cm)</label>
            <input type="number" class="form-control" id="diametro_med" name="diametro_med"
              value="<?= $id ? $user['diametro_med'] : '' ?>">
          </div>

          <div class="col-sm-4">
            <label for="conformidade_venda">Está em conformidade para Venda?</label>
            <select class="custom-select" id="conformidade_venda" name="conformidade_venda">
              <option value="">Selecione</option>
              <option value="Sim" <?= ($id && $user['conformidade_venda'] == "Sim") ? "selected" : '' ?>>Sim
              </option>
              <option value="Não" <?= ($id && $user['conformidade_venda'] == "Não") ? "selected" : '' ?>>Não
              </option>
            </select>
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
      </div>
    </form>

    <div class="container mt-5">
      <h2 class="d-flex justify-content-center">Medições realizadas</h2>
      <div class="card p-3">
        <table class="table table-striped table-light">
          <thead>
            <tr>
              <th>ID Área</th>
              <th>Área Referência</th>
              <th>Data inspeção</th>
              <th>Diâmetro Fruto</th>
              <th>Apropriado para venda?</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($linha = $dados->fetch_assoc()): ?>
              <tr>
                <td><?= $linha['id_qualidade'] ?></td>
                <td><?= $linha['nome_plantio'] ?></td>
                <td><?= $linha['data_medicao'] ?></td>
                <td><?= $linha['diametro_med'] ?></td>
                <td><?= $linha['conformidade_venda'] ?></td>
                <td>
                  <a href="qualidade.php?id=<?= $linha['id_qualidade'] ?>" class="btn btn-warning btn-sm">Editar</a>
                  <button type="button" class="btn btn-danger btn-sm btn-exluir"
                    data-id="<?= $linha['id_qualidade'] ?>">Excluir</button>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    document.querySelectorAll('.btn-danger').forEach(button => {
      button.addEventListener('click', () => {
        const id = button.getAttribute('data-id'); // Obtém o ID do botão
        if (confirm('Tem certeza de que deseja excluir este registro?')) {
          fetch('/pi_gandara/pcp/bd_pcp_qualidade.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
              },
              body: `acao=DELETAR&id_qualidade=${id}` // Certifique-se de que o nome corresponde ao esperado no PHP
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