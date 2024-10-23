<?php
require "../../utils/conexao.php";

// Ex: colocar o valor do POST se ele existir, se não deixar em branco.

// variavel = condição ? se VERDADEIRO : se FALSE;
$produto = isset($_POST['produto']) && !empty($_POST['produto']) ? $_POST['produto'] : null;
$descricao = isset($_POST['descricao']) && !empty($_POST['descricao']) ? $_POST['descricao'] : null;
$codProduto = isset($_POST['cod_produto']) && !empty($_POST['cod_produto']) ? $_POST['cod_produto'] : null;
$unidade = isset($_POST['unidade']) && !empty($_POST['unidade']) ? $_POST['unidade'] : null;
$idProduto = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

// Verificamos qual operaçaõ está sendo feita .

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO cad_produtos (produto, descricao, cod_produto, unidade) 
    VALUE (?, ?, ?, ?);";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssss",
        $produto,
        $descricao,
        $codProduto,
        $unidade
    );

    try {
        if ($stmt->execute()) { 
            // Pega o numero do ID que foi inserido no BD
            $idCadProduto = $conn->insert_id;
            echo $idCadProduto;

            header('Location: /pi_gandara/compras/cadProduto.php');
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
        $sql = "UPDATE cad_produtos SET
        produto = ?,
        descricao = ?,
        cod_produto = ?,
        unidade = ?
        WHERE id = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssi",
            $produto,
            $descricao,
            $codProduto,
            $unidade,
            $idProduto
        );
    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/compras/cadProduto.php');
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
    
    $sql = "DELETE FROM cad_produto WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idProduto);
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
