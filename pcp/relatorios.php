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
    ['atividade' => 'Colheita e transporte', 'tempo' => 12, 'material' => 'Caminhão para transporte', 'quantidade' => 0.9, 'un' => 'Un', 'preco' => 2280.00],
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
    .card {
      height: auto;
      width: 100%;
      background-color: transparent;

    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>



  <title>Relatórios</title>
</head>

<header>
  <?php
  include_once('../utils/menu.php');
  ?>
</header>

<body>

  <div class="container">
    <a href="../pcp/index.php" class="btn">
      <div class="col-2">
        <div style="width: 18rem;">
          <span class="fa fa-chevron-left fa-2x p-3" aria-hidden=" true"></span>
        </div>
      </div>
    </a>

    <div class="col m-5 d-flex justify-content-center">
      <h1>Relatório das plantações</h1>
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
        <div class="container">
          <h3 class="d-flex justify-content-center">Resultados para a área: <?= $area_selecionada['nome_plantio'] ?>
            (<?= $area_selecionada['area_plantio'] ?>
            ha)</h3>
        </div>

        <?php

        // Recupera as datas de plantio e colheita com base na seleção do usuário
        $sql_datas = "SELECT data_plantio, data_colheita FROM agendamento_plantacao WHERE id_agendamento = ?";
        $stmt_datas = $conn->prepare($sql_datas);
        $stmt_datas->bind_param('i', $id_selecionado);
        $stmt_datas->execute();
        $result_datas = $stmt_datas->get_result();
        $dados_datas = $result_datas->fetch_assoc();
        ?>

        <!-- Exibe as datas de plantio e colheita -->
        <?php if (isset($dados_datas['data_plantio']) && isset($dados_datas['data_colheita'])): ?>
          <p class="text-center text-bold">
            Data estimada para Plantio: <?= date('d/m/Y', strtotime($dados_datas['data_plantio'])) ?><br>
            Data estimada para Colheita: <?= date('d/m/Y', strtotime($dados_datas['data_colheita'])) ?>
          </p>
        <?php endif; ?>


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
        <div class="container">
          <h3 class="mt-5 d-flex justify-content-center">Indicadores de Produção</h3>
        </div>
        <?php
        // Indicadores por hectare
        $plantas_por_hectare = 667;
        $tempo_anos = 4.08;
        $produtividade_por_planta = 800;
        $producao_por_hectare_un = $plantas_por_hectare * $produtividade_por_planta;
        $peso_caixa_kg = 40;
        $producao_por_hectare_kg = $producao_por_hectare_un * 0.100;
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
              <td>Produção/unidade</td>
              <td><?= number_format($producao_por_hectare_un, 0, ',', '.') ?></td>
              <td><?= number_format($producao_total_un, 0, ',', '.') ?></td>
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

    <div class="container">
      <h3 class="mt-5 d-flex justify-content-center">Gráfico de Custos por Atividade</h3>
      <canvas id="graficoCustos" width="400" height="200"></canvas>
    </div>

    <?php
    // Prepara os dados para o gráfico
    $atividades_nomes = [];
    $custos_totais = [];
    foreach ($atividades as $atividade) {
      $quantidade_total = $atividade['quantidade'] * $area_selecionada['area_plantio'];
      $custo_total = $quantidade_total * $atividade['preco'];
      $atividades_nomes[] = $atividade['atividade'];
      $custos_totais[] = $custo_total;
    }
    ?>

    <script>
      // Dados do PHP para o gráfico
      const atividades = <?= json_encode($atividades_nomes) ?>; // Nomes das atividades
      const custos = <?= json_encode($custos_totais) ?>;        // Custos totais

      // Configuração e criação do gráfico com Chart.js
      const ctx = document.getElementById('graficoCustos').getContext('2d');
      const grafico = new Chart(ctx, {
        type: 'bar', // Tipo do gráfico: barras
        data: {
          labels: atividades, // Labels das atividades
          datasets: [{
            label: 'Custos Totais (R$)',
            data: custos, // Custos como dados do gráfico
            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Cor de fundo das barras
            borderColor: 'rgba(75, 192, 192, 1)', // Cor da borda das barras
            borderWidth: 1 // Largura da borda
          }]
        },
        options: {
          responsive: true, // Torna o gráfico responsivo
          scales: {
            y: {
              beginAtZero: true, // Eixo Y começa no zero
              ticks: {
                callback: function (value) {
                  // Formata os valores no eixo Y como moeda
                  return 'R$ ' + value.toLocaleString('pt-BR');
                }
              }
            }
          },
          plugins: {
            legend: {
              display: true, // Exibe a legenda
              labels: {
                font: {
                  size: 14 // Tamanho da fonte da legenda
                }
              }
            },
            datalabels: {
              anchor: 'end', // Âncora do rótulo (pode ser 'center', 'start' ou 'end')
              align: 'top',  // Alinhamento do rótulo (pode ser 'top', 'bottom', 'center', etc.)
              formatter: function (value) {
                // Formata o rótulo como moeda
                return 'R$ ' + value.toLocaleString('pt-BR');
              },
              font: {
                size: 12 // Tamanho da fonte do rótulo
              },
              color: '#333' // Cor do texto do rótulo
            }
          }
        },
        plugins: [ChartDataLabels] // Ativa o plugin de datalabels
      });
    </script>

    <?php
    // Calcular progresso acumulado para a curva S
    $sqlCurva = "
    SELECT 
        id_medicao, 
        id_nome_plantio, 
        data_medicao, 
        diametro_fruto, 
        DATEDIFF(data_medicao, MIN(data_medicao) OVER (PARTITION BY id_nome_plantio)) AS semanas_plantio
    FROM 
        medicao_producao 
    ORDER BY 
        data_medicao;
";

    $resultCurva = $conn->query($sqlCurva);

    $curvaData = [];
    while ($row = $resultCurva->fetch_assoc()) {
      $curvaData[] = [
        'id' => $row['id_medicao'],
        'plantio' => $row['id_nome_plantio'],
        'data' => $row['data_medicao'],
        'diametro' => $row['diametro_fruto'],
        'semanas' => round($row['semanas_plantio'] / 7, 1) // Convertendo dias para semanas
      ];
    }

    // Enviar os dados para o JavaScript
    echo "<script>const curvaSData = " . json_encode($curvaData) . ";</script>";
    ?>


    <div class="container mt-5">
      <h2 class="d-flex justify-content-center">Curva S - Progresso da Produção</h2>
      <canvas id="graficoCurvaS" style="max-height: 400px;"></canvas>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        // Preparar os dados para o gráfico Curva S
        const semanas = curvaSData.map(item => item.semanas); // Tempo em semanas
        const diametros = curvaSData.map(item => item.diametro); // Diâmetro acumulado

        // Configuração do gráfico
        const ctx = document.getElementById('graficoCurvaS').getContext('2d');
        const graficoCurvaS = new Chart(ctx, {
          type: 'line', // Gráfico de linha para a Curva S
          data: {
            labels: semanas, // Semanas como eixo X
            datasets: [{
              label: 'Progresso da Produção (Curva S)',
              data: diametros, // Dados acumulados
              borderColor: 'rgba(75, 192, 192, 1)',
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderWidth: 2,
              tension: 0.6 // Curvatura da linha
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                display: true
              }
            },
            scales: {
              x: {
                title: {
                  display: true,
                  text: 'Semanas após plantio'
                }
              },
              y: {
                beginAtZero: true,
                title: {
                  display: true,
                  text: 'Diâmetro (cm)'
                }
              }
            }
          }
        });
      });
    </script>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        // Preparar os dados para o gráfico Curva S
        const semanas = curvaSData.map(item => item.semanas); // Tempo em semanas
        const diametros = curvaSData.map(item => item.diametro); // Diâmetro acumulado

        // Verificar se a medição de semanas ultrapassa 192
        if (semanas.some(semana => semana > 192)) {
          // Mostrar mensagem de aviso
          const avisoElement = document.createElement('div');
          avisoElement.style.position = 'fixed';
          avisoElement.style.top = '20px';
          avisoElement.style.left = '50%';
          avisoElement.style.transform = 'translateX(-50%)';
          avisoElement.style.padding = '15px';
          avisoElement.style.backgroundColor = 'rgba(0, 255, 0, 0.8)';
          avisoElement.style.color = 'white';
          avisoElement.style.fontSize = '20px';
          avisoElement.style.fontWeight = 'bold';
          avisoElement.style.borderRadius = '5px';
          avisoElement.textContent = 'A plantação está pronta para colheita';

          document.body.appendChild(avisoElement);

          // Remover o aviso após alguns segundos (opcional)
          setTimeout(() => {
            avisoElement.remove();
          }, 5000); // Remover após 5 segundos
        }

        // Configuração do gráfico
        const ctx = document.getElementById('graficoCurvaS').getContext('2d');
        const graficoCurvaS = new Chart(ctx, {
          type: 'line', // Gráfico de linha para a Curva S
          data: {
            labels: semanas, // Semanas como eixo X
            datasets: [{
              label: 'Progresso da Produção (Curva S)',
              data: diametros, // Dados acumulados
              borderColor: 'rgba(75, 192, 192, 1)',
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderWidth: 2,
              tension: 0.6 // Curvatura da linha
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                display: true
              }
            },
            scales: {
              x: {
                title: {
                  display: true,
                  text: 'Semanas após plantio'
                }
              },
              y: {
                beginAtZero: true,
                title: {
                  display: true,
                  text: 'Diâmetro (cm)'
                }
              }
            }
          }
        });
      });
    </script>


    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>