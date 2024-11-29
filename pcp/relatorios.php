<?php
require '../utils/conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Obtém os dados do banco para preencher o select
$sql = "SELECT id_agendamento, nome_plantio, area_plantio FROM agendamento_plantacao;";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->execute();
    $dados = $stmt->get_result();
} else {
    die("Erro ao preparar a consulta: " . $conn->error);
}

// Inicializa variáveis para o filtro
$area_selecionada = null;
$atividades = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_agendamento'])) {
    $id_selecionado = $_POST['id_agendamento'];

    // Obtém a área correspondente à seleção
    $sql_area = "SELECT nome_plantio, area_plantio FROM agendamento_plantacao WHERE id_agendamento = ?";
    $stmt_area = $conn->prepare($sql_area);
    $stmt_area->bind_param('i', $id_selecionado);
    $stmt_area->execute();
    $area_selecionada = $stmt_area->get_result()->fetch_assoc();

    // Atividades e materiais (com a coluna "tempo")
    $atividades = [
        ['atividade' => 'Identificar área', 'tempo' => 2, 'material' => '', 'quantidade' => 0, 'un' => '', 'preco' => 0],
        ['atividade' => 'Identificar materiais', 'tempo' => 4, 'material' => '', 'quantidade' => 0, 'un' => '', 'preco' => 0],
        ['atividade' => 'Requisitar materiais', 'tempo' => 8, 'material' => 'Calcário', 'quantidade' => 4, 'un' => 'Tn', 'preco' => 2000],
        ['atividade' => 'Requisitar materiais', 'tempo' => 3, 'material' => 'Mudas', 'quantidade' => 667, 'un' => 'Un', 'preco' => 30],
        ['atividade' => 'Preparar solo', 'tempo' => 2, 'material' => 'Caixas para mudas', 'quantidade' => 4, 'un' => 'Un', 'preco' => 36.50],
        ['atividade' => 'Início da plantação', 'tempo' => 2, 'material' => 'Adubo orgânico', 'quantidade' => 4002, 'un' => 'L', 'preco' => 1.50],
        ['atividade' => 'Início da plantação', 'tempo' => 2, 'material' => 'Superfosfato Simples', 'quantidade' => 167, 'un' => 'kg', 'preco' => 3.08],
        ['atividade' => 'Adubação de cobertura', 'tempo' => 8, 'material' => 'Sulfato de amônio', 'quantidade' => 333, 'un' => 'kg', 'preco' => 3.60],
        ['atividade' => 'Adubação de cobertura', 'tempo' => 16, 'material' => 'Cloreto de Potássio', 'quantidade' => 220, 'un' => 'kg', 'preco' => 5.86],
        ['atividade' => 'Colheita', 'tempo' => 12, 'material' => 'Caixas para transporte', 'quantidade' => 4800, 'un' => 'Un', 'preco' => 60.00],
    ];
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
<style>

.card{
  height: auto;
  width: 100%;
  background-color: transparent;

}
</style>

 

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

      <a href="../pcp/index.php" class="btn">
        <div class="col-2">
          <div style="width: 18rem;">
            <span class="fa fa-chevron-left fa-2x p-3" aria-hidden=" true"></span>
          </div>
        </div>
      </a>

      <div class="col-6 m-5 d-flex justify-content-center">
        <h3>Relatório das plantações</h3>
      </div>
      
      <div class="card  p-5">

      <h3 class="text-center">Custos por Área de Plantio</h3>

      <!-- Formulário para seleção da área -->
      <form method="POST" class="mb-4">
        <div class="form-group">
          <label for="id_agendamento">Selecione a área de plantio:</label>
          <select class="form-control" name="id_agendamento" id="id_agendamento" required>
            <option value="">Selecione...</option>
            <?php while ($linha = $dados->fetch_assoc()): ?>
              <option value="<?= $linha['id_agendamento'] ?>" <?= isset($id_selecionado) && $id_selecionado == $linha['id_agendamento'] ? 'selected' : '' ?>>
                <?= $linha['nome_plantio'] ?>
              </option>
            <?php endwhile; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
      </form>




      <?php if ($area_selecionada): ?>
        <h3>Resultados para a área: <?= $area_selecionada['nome_plantio'] ?> (<?= $area_selecionada['area_plantio'] ?> ha)</h3>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Atividade</th>
              <th>Tempo (semanas)</th>
              <th>Material</th>
              <th>Quantidade Total</th>
              <th>Unidade</th>
              <th>Preço Unitário</th>
              <th>Custo Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($atividades as $atividade): ?>
              <?php
              // Cálculo do total baseado na área selecionada
              $quantidade_total = $atividade['quantidade'] * $area_selecionada['area_plantio'];
              $custo_total = $quantidade_total * $atividade['preco'];
              ?>
              <tr>
                <td><?= $atividade['atividade'] ?></td>
                <td><?= $atividade['tempo'] ?></td>
                <td><?= $atividade['material'] ?></td>
                <td><?= $quantidade_total ?></td>
                <td><?= $atividade['un'] ?></td>
                <td>R$ <?= number_format($atividade['preco'], 2, ',', '.') ?></td>
                <td>R$ <?= number_format($custo_total, 2, ',', '.') ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <!-- Nova seção: Indicadores de Produção -->
        <h3 class="mt-5">Indicadores de Produção</h3>
        <?php
        // Indicadores por hectare
        $plantas_por_hectare = 667;
        $tempo_anos = 4.08;
        $produtividade_por_planta = 800;
        $producao_por_hectare_un = $plantas_por_hectare * $produtividade_por_planta;
        $peso_caixa_kg = 40;
        $producao_por_hectare_kg = $producao_por_hectare_un;
        $preco_por_kg = 6.00;
        $valor_safra_por_hectare = $producao_por_hectare_kg * $preco_por_kg;
        $custo_producao_por_hectare = 332596.24;
        $lucro_bruto_por_hectare = $valor_safra_por_hectare - $custo_producao_por_hectare;

        // Recalculo para área selecionada
        $producao_total_un = $producao_por_hectare_un * $area_selecionada['area_plantio'];
        $producao_total_kg = $producao_por_hectare_kg * $area_selecionada['area_plantio'];
        $valor_safra_total = $valor_safra_por_hectare * $area_selecionada['area_plantio'];
        $custo_producao_total = $custo_producao_por_hectare * $area_selecionada['area_plantio'];
        $lucro_bruto_total = $lucro_bruto_por_hectare * $area_selecionada['area_plantio'];
        ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Indicador</th>
              <th>Por Hectare</th>
              <th>Total (<?= $area_selecionada['area_plantio'] ?> ha)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Plantas/ha</td>
              <td>667</td>
              <td><?= 667 * $area_selecionada['area_plantio'] ?></td>
            </tr>
            <tr>
              <td>Tempo/anos</td>
              <td>4,08</td>
              <td>4,08</td>
            </tr>
            <tr>
              <td>Produtividade por planta</td>
              <td>800</td>
              <td>800</td>
            </tr>
            <tr>
              <td>Produção/unidade</td>
              <td><?= number_format($producao_por_hectare_un, 0, ',', '.') ?></td>
              <td><?= number_format($producao_total_un, 0, ',', '.') ?></td>
            </tr>
            <tr>
              <td>Peso por caixa (kg)</td>
              <td>40</td>
              <td>40</td>
            </tr>
            <tr>
              <td>Produção total (Kg)</td>
              <td><?= number_format($producao_por_hectare_kg, 0, ',', '.') ?></td>
              <td><?= number_format($producao_total_kg, 0, ',', '.') ?></td>
            </tr>
            <tr>
              <td>Preço por Kg</td>
              <td>R$ 6,00</td>
              <td>R$ 6,00</td>
            </tr>
            <tr>
              <td>Valor Safra</td>
              <td>R$ <?= number_format($valor_safra_por_hectare, 2, ',', '.') ?></td>
              <td>R$ <?= number_format($valor_safra_total, 2, ',', '.') ?></td>
            </tr>
            <tr>
              <td>Custo de produção</td>
              <td>R$ <?= number_format($custo_producao_por_hectare, 2, ',', '.') ?></td>
              <td>R$ <?= number_format($custo_producao_total, 2, ',', '.') ?></td>
            </tr>
            <tr>
              <td>Lucro bruto</td>
              <td>R$ <?= number_format($lucro_bruto_por_hectare, 2, ',', '.') ?></td>
              <td>R$ <?= number_format($lucro_bruto_total, 2, ',', '.') ?></td>
            </tr>
          </tbody>
        </table>
      <?php else: ?>
        <p class="text-center">Selecione uma área para visualizar os resultados.</p>
      <?php endif; ?>
    </div>



    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
  
</body>

</html>