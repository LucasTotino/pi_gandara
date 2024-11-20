<?php
require "../../utils/conexao.php";

// Ex: colocar o valor do POST se ele existir, se não deixar em branco.

// variavel = condição ? se VERDADEIRO : se FALSE;
$idPedido = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
$codigo = isset($_POST['id_solicitacao']) && !empty($_POST['id_solicitacao']) ? $_POST['id_solicitacao'] : null;
$idFornecedor = isset($_POST['id_fornecedor']) && !empty($_POST['id_fornecedor']) ? $_POST['id_fornecedor'] : null;
$dataPedido = isset($_POST['data_pedido']) && !empty($_POST['data_pedido']) ? $_POST['data_pedido'] : null;
$valor = isset($_POST['valor']) && !empty($_POST['valor']) ? $_POST['valor'] : null;
$quantidade = isset($_POST['qtd']) && !empty($_POST['qtd']) ? $_POST['qtd'] : null;
$previsao = isset($_POST['pre_compra']) && !empty($_POST['pre_compra']) ? $_POST['pre_compra'] : null;
$dataUltima = isset($_POST['data_u_compra']) && !empty($_POST['data_u_compra']) ? $_POST['data_u_compra'] : null;
$historico = isset($_POST['historico']) && !empty($_POST['historico']) ? $_POST['historico'] : null;
$qtdBaixada = isset($_POST['qtd_baixada']) && !empty($_POST['qtd_baixada']) ? $_POST['qtd_baixada'] : null;
$valorBaixado = isset($_POST['valor_baixado']) && !empty($_POST['valor_baixado']) ? $_POST['valor_baixado'] : null;
$saldoQtd = isset($_POST['saldo_qtd']) && !empty($_POST['saldo_qtd']) ? $_POST['saldo_qtd'] : null;
$saldoComprado = isset($_POST['saldo_comprado']) && !empty($_POST['saldo_comprado']) ? $_POST['saldo_comprado'] : null;
$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

// Verificamos qual operaçaõ está sendo feita .

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO pedido_compra (id_solicitacao, id_fornecedor, data_pedido, valor, qtd, pre_compra, data_u_compra, historico, qtd_baixada, valor_baixado , saldo_qtd, saldo_comprado) 
    VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD 
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJECTION 
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP

    $stmt = $conn->prepare($sql);

    // O função bind_param insere as variveis no lugar das '?'
    // O primeiro parametro é o tipo do dado, os demais são apenas as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decaimais), s = texto(com tudo que não é numero)
    $stmt->bind_param(
        "iisddsssdddd",
        $codigo,
        $idFornecedor,
        $dataPedido,
        $valor,
        $quantidade,
        $previsao,
        $dataUltima,
        $historico,
        $qtdBaixada,
        $valorBaixado,
        $saldoQtd,
        $saldoComprado
    );

    // A função execute envia o script SQL todo arrumado para o BD, com as variaveis 
    // nos lugares das ?.

    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idinsertPedido = $conn->insert_id;
            echo $idinsertPedido;

            header('Location: /pi_gandara/compras/pedidoCompra.php');
        } else {
            echo $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao cadastrar!";
        // Vamos utilizar JS para poder recuperar os dados digitados 
?>
        <script>
            history.back();
        </script>
    <?php
    }
    //Fecha o Prepared Statement
    $stmt->close();
    //Fecha a conexão 
    $conn->close();


    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
} else if ($acao == "ALTERAR") {
    $sql = "UPDATE pedido_compra SET
        id_solicitacao = ?,
        id_fornecedor = ?,
        data_pedido,valor = ?,
        qtd,pre_compra = ?,
        data_u_compra = ?,
        historico = ?,
        qtd_baixada = ?,
        valor_baixado = ?,
        saldo_qtd = ?
        WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "iisddsssdddd",
        $codigo,
        $idFornecedor,
        $dataPedido,
        $valor,
        $quantidade,
        $previsao,
        $dataUltima,
        $historico,
        $qtdBaixada,
        $valorBaixado,
        $saldoQtd,
        $saldoComprado
    );
    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/compras/pedidoCompra.php');
        } else {
            echo $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao Atualizar!";
        // Vamos utilizar JS para poder recuperar os dados digitados 
    ?>
        <script>
            history.back();
        </script>
<?php
    }
    //Fecha o Prepared Statement
    $stmt->close();
    //Fecha a conexão 
    $conn->close();
} else if ($acao == "DELETAR") {
    // Neste bloco será excluido um registro que já existe no BD.

    $sql = "DELETE FROM pedido_compra WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idPedido);
    if ($stmt->execute()) {
        echo json_encode(array(
            "status" => "sucesso",
            "message" => "Pedido excluido com sucesso!"
        ));
    } else {
        echo json_encode(array(
            "status" => "erro",
            "message" => "erro ao excluir o registro!" . $stmt->error
        ));
        $stmt->close();
        $conn->close();
    }
} else {
    // Se nenhuma das operações for solicitada,volta para o inicio do site.
    // A função header modifica o cabeçalho do navegador 
    // Ao passar a propriedade location, definimos para qual URL o navegador deve ir.
    header("Location: /pi_gandara/dashboard.php");
    exit;
}
