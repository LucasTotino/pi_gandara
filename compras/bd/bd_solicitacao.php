<?php
require "../../utils/conexao.php";

// Ex: colocar o valor do POST se ele existir, se não deixar em branco.

// variavel = condição ? se VERDADEIRO : se FALSE;
$idProduto = isset($_POST['id_produto']) && !empty($_POST['id_produto']) ? $_POST['id_produto'] : null;
$idCriador = isset($_POST['id_usuario']) && !empty($_POST['id_usuario']) ? $_POST['id_usuario'] : null;
$observacao = isset($_POST['observacao']) && !empty($_POST['observacao']) ? $_POST['observacao'] : null;
$qtd = isset($_POST['qtd']) && !empty($_POST['qtd']) ? $_POST['qtd'] : null;
$dataEntrega = isset($_POST['dataentrega']) && !empty($_POST['dataentrega']) ? $_POST['dataentrega'] : null;
$dataCriacao = isset($_POST['datacriacao']) && !empty($_POST['datacriacao']) ? $_POST['datacriacao'] : null;
$finalidade = isset($_POST['finalidade']) && !empty($_POST['finalidade']) ? $_POST['finalidade'] : null;
$origem = isset($_POST['origem']) && !empty($_POST['origem']) ? $_POST['origem'] : null;
$idSolCompra = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

// Verificamos qual operaçaõ está sendo feita .

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO sol_compra (id_produto, id_usuario, observacao, qtd, data_entrega, data_criacao,
    finalidade, origem) 
    VALUE (?, ?, ?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD 
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJECTION 
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP

    $stmt = $conn->prepare($sql);

    // O função bind_param insere as variveis no lugar das '?'
    // O primeiro parametro é o tipo do dado, os demais são apenas as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decaimais), s = texto(com tudo que não é numero)
    $stmt->bind_param(
        "iisdssss",
        $idProduto,
        $idCriador,
        $observacao,
        $qtd,
        $dataEntrega,
        $dataCriacao,
        $finalidade,
        $origem
    );

    // A função execute envia o script SQL todo arrumado para o BD, com as variaveis 
    // nos lugares das ?.

    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idCadSolCompra = $conn->insert_id;
            echo $idCadSolCompra;

            header('Location: /pi_gandara/compras/solicitacaoCompra.php');
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
    $sql = "UPDATE sol_compra SET
        id_produto = ?,
        id_usuario = ?,
        observacao = ?,
        qtd = ?,
        data_entrega = ?,
        data_criacao = ?,
        finalidade = ?,
        origem = ?
        WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "iisdssssi",
        $idProduto,
        $idCriador,
        $observacao,
        $qtd,
        $dataEntrega,
        $dataCriacao,
        $finalidade,
        $origem,
        $idSolCompra
    );
    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/compras/solicitacaoCompra.php');
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

    $sql = "DELETE FROM sol_compra WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idSolCompra);
    if ($stmt->execute()) {
        echo json_encode(array(
            "status" => "sucesso",
            "message" => "Registro excluido com sucesso!"
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
