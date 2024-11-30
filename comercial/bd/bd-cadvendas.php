<?php
require "../../utils/conexao.php";

$nomeCliente = isset($_POST['nome']) && !empty($_POST['nome']) ? $_POST['nome'] : null;
$tipovenda = isset($_POST['tipo_venda']) && !empty($_POST['tipo_venda']) ? $_POST['tipo_venda'] : null;
$origemvenda = isset($_POST['origemvenda']) && !empty($_POST['origemvenda']) ? $_POST['origemvenda'] : null;
$nomepromocao = isset($_POST['nomepromocao']) && !empty($_POST['nomepromocao']) ? $_POST['nomepromocao'] : null;
$data_venda = isset($_POST['data_venda']) && !empty($_POST['data_venda']) ? $_POST['data_venda'] : null;
$produto = isset($_POST['produto']) && !empty($_POST['produto']) ? $_POST['produto'] : null;
$qtd = isset($_POST['qtd']) && !empty($_POST['qtd']) ? $_POST['qtd'] : null;
$valor = isset($_POST['valor']) && !empty($_POST['valor']) ? $_POST['valor'] : null;
$id_venda = isset($_POST['id_venda']) && !empty($_POST['id_venda']) ? $_POST['id_venda'] : null;

$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO cad_venda (nomeCliente, tipo_venda, origemvenda, nomepromocao, 
    data_venda, produto, qtd, valor) 
    VALUE (?, ?, ?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD 
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJECTION 
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP

    $stmt = $conn->prepare($sql);

    // O função bind_param insere as variveis no lugar das '?'
    // O primeiro parametro é o tipo do dado, os demais são apenas as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decaimais), s = texto(com tudo que não é numero)
    $stmt->bind_param(
        "ssssssid",
        $nomeCliente,
        $tipovenda,
        $origemvenda,
        $nomepromocao,
        $data_venda,
        $produto,
        $qtd,
        $valor
    );
    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idCadCliente = $conn->insert_id;
            echo $idCadCliente;

            header('Location: /pi_gandara/comercial/cadVendas.php');
        } else {
            echo $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao cadastrar!";
        // Vamos utilizar JS para poder recuperar os dados digitados 
?>

        
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
    $sql = "UPDATE cad_venda SET
        nomeCliente = ?,
        tipo_venda = ?,
        origemvenda = ?,
        nomepromocao = ?,
        data_venda = ?,
        produto = ?,
        qtd = ?,
        valor = ?
        WHERE id_venda = ?;";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssssssid",
        $nomeCliente,
        $tipovenda,
        $origemvenda,
        $nomepromocao,
        $data_venda,
        $produto,
        $qtd,
        $valor,
        $id_venda

    );

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/comercial/cadVendas.php');
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
    // Neste bloco será excluido um registro que ja existe no BD

    $sql = "DELETE FROM cad_venda WHERE id_venda = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_venda);

    if ($stmt->execute()) {
        echo json_encode(array(
            "status" => "sucesso",
            "message" => "Registro excluído com sucesso!"
        ));
    } else {
        echo json_encode(array(
            "status" => "erro",
            "message" => "Erro ao excluir o registro: " . $stmt->error
        ));
    }

    $stmt->close();

    $conn->close();
} else {
    //Se nenhuma das operações for solicitada, volta ára o inicio do site.
    // A função header modifica o cabeçalho do navegador
    // Ao passar a propriedade location, definimos para qual URL o navegador deve ir.
    header("Location: /site-pi/");
    exit;
}
?>