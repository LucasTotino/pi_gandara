<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
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
    <h4>Adicionar métodos para identificar os padrões de qualidade e benficiamento</h4>

    <h2>Registrar Não Conformidade</h2>

    <form action="registrar_nao_conformidade.php" method="POST">
      <label for="produto_id">ID do Produto:</label><br>
      <input type="number" id="produto_id" name="produto_id" required><br><br>

      <label for="descricao">Descrição da Não Conformidade:</label><br>
      <textarea id="descricao" name="descricao" rows="4" cols="50" required></textarea><br><br>

      <label for="responsavel">Responsável:</label><br>
      <input type="text" id="responsavel" name="responsavel" required><br><br>

      <label for="data">Data:</label><br>
      <input type="datetime-local" id="data" name="data" required><br><br>

      <input type="submit" value="Registrar">
    </form>

    <h2>Registrar Inspeção de Qualidade</h2>

    <form action="registrar_inspecao.php" method="POST">
      <label for="lote_id">ID do Lote:</label><br>
      <input type="number" id="lote_id" name="lote_id" required><br><br>

      <label for="criterios">Critérios de Inspeção:</label><br>
      <textarea id="criterios" name="criterios" rows="3" cols="50" required></textarea><br><br>

      <label for="resultado">Resultado:</label><br>
      <select id="resultado" name="resultado" required>
        <option value="Aprovado">Aprovado</option>
        <option value="Reprovado">Reprovado</option>
      </select><br><br>

      <label for="responsavel">Responsável:</label><br>
      <input type="text" id="responsavel" name="responsavel" required><br><br>

      <label for="data">Data:</label><br>
      <input type="datetime-local" id="data" name="data" required><br><br>

      <input type="submit" value="Registrar">
    </form>


  </div>




  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>