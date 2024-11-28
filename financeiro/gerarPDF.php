<?php
require_once('../utils/conexao.php');
require_once('tcpdf/tcpdf.php'); // Ajuste o caminho conforme necessário

// Criar novo PDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Relatório de Vendas');
$pdf->SetHeaderData('', 0, 'Relatório de Vendas', 'Gerado em: ' . date('d/m/Y H:i:s'));
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(15, 27, 15);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->AddPage();

// Definir fonte
$pdf->SetFont('helvetica', '', 12);

// Consultar os dados das vendas
$sql = "SELECT * FROM cad_vendas;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$dados = $stmt->get_result();

// Criar tabela HTML para os dados
$html = '<h2>Contas a Receber</h2>';
$html .= '<table border="1" cellpadding="4">';
$html .= '<thead>
            <tr>
                <th>Número Pedido</th>
                <th>Nome do Cliente</th>
                <th>Data Venda</th>
                <th>Produto</th>
                <th>Valor da Venda</th>
            </tr>
          </thead>
          <tbody>';

while ($linha = $dados->fetch_assoc()) {
    $valorVenda = number_format($linha['quantidade'] * $linha['valor'], 2, ',', '.');
    $html .= '<tr>
                <td>' . $linha['id_venda'] . '</td>
                <td>' . $linha['nome'] . '</td>
                <td>' . $linha['dia_venda'] . '</td>
                <td>' . $linha['produto'] . '</td>
                <td>R$: ' . $valorVenda . '</td>
              </tr>';
}

$html .= '</tbody></table>';

// Escrever o conteúdo HTML no PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Fechar e gerar o PDF
$pdf->Output('relatorio_vendas.pdf', 'I'); // 'I' para abrir no navegador, 'D' para download