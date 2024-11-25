<?php
require '../utils/conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se veio um ID na URL e valida se é um inteiro
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$cor = ($id) ? "btn-warning" : "btn-success";
$id_qualidade = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
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
            header("Location: ../pcp/index.php"); // Redireciona caso o ID não seja encontrado
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
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title>Trabalho Gandara!</title>
</head>
<header>
  <?php
  include_once('../utils/menu.php');
  ?>
</header>

<body>


  <div class="container mt-5">
    <form action="" method="POST"><!-- Inicio Formulário -->
      <div class="row">

        <a href="../pcp/index.php" class="btn">
          <div class="col-2">
            <div style="width: 18rem;">
              <span class="fa fa-chevron-left fa-2x p-3" aria-hidden=" true"></span>
            </div>
          </div>
        </a>

        <div class="col-6 m-5">
          <h3>Resgistro de Qualidade</h3>
        </div>

      </div>

      <div class="form-group">
        <form action="../pcp/bd_pcp_qualidade.php" method="POST"><!-- Inicio Formulário -->

          <input type="hidden" id="id_qualidade" name="id_qualidade" value="<?= $idQualidade ?? null ?>">
          <input type="hidden" name="acao" id="acao" value="<?= $id ? "ALTERAR" : "INCLUIR" ?>">

          <!-- Nome, CPF e Data Nascimento -->
          <div class="form-row justify-content-center mt-2">
            <div class="col-sm-6">

              <label for="nome_plantio">Item</label>
              <select name="nome_plantio" id="nome_plantio" class="form-control">
                <option value="">Selecione um item</option>
                <?php

                $sql = "SELECT id_agendamento, nome_plantio FROM agendamento_plantacao";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['nome_plantio'] . "'>" . $row['nome_plantio'] . "</option>";
                  }
                } else {
                  echo "<option value=''>Nenhum item encontrado</option>";
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
              <div class="input-group">
                <select class="custom-select" id="conformidade_venda" name="conformidade_venda">
                  <option value="">Selecione</option>
                  <option <?= ($id_qualidade && $user["conformidade_venda"] == "Sim") ? "selected" : '' ?> value="Sim">Sim
                  </option>
                  <option <?= ($id_qualidade && $user["conformidade_venda"] == "Não") ? "selected" : '' ?> value="Não">Não
                  </option>
                </select>
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

      </div>



      <div class="container mt-5">
        <h2 class="d-flex justify-content-center">Medições realizadas</h2>
        <div class="card p-3">
          <table class="table table-striped table-light">
            <thead>
              <tr>
                <th>Área Referência</th>
                <th>Data inspeção</th>
                <th>Diametro Fruto</th>
                <th>Apropriado para venda ?</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($linha = $dados->fetch_assoc()): ?>
                <tr>
                  <td><?= $linha['nome_plantio'] ?></td>
                  <td><?= $linha['data_medicao'] ?></td>
                  <td><?= $linha['diametro_med'] ?></td>
                  <td><?= $linha['conformidade_venda'] ?></td>
                  <td>
                    <a href=".php?id=<?= $linha['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <button type="button" class="btn btn-danger btn-sm" data-id="<?= $linha['id'] ?>">Excluir</button>
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