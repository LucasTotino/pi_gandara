<?php
require "../../utils/conexao.php";

$nomepromocao = isset($_POST['nomepromocao']) && !empty($_POST['nomepromocao']) ? $_POST['nomepromocao'] : null;
$iniciopromo = isset($_POST['iniciopromo']) && !empty($_POST['iniciopromo']) ? $_POST['iniciopromo'] : null;
$fimpromo = isset($_POST['fimpromo']) && !empty($_POST['fimpromo']) ? $_POST['fimpromo'] : null;
$cod_produto = isset($_POST['cod_produto']) && !empty($_POST['cod_produto']) ? $_POST['cod_produto'] : null;
$produto = isset($_POST['produto']) && !empty($_POST['produto']) ? $_POST['produto'] : null;
$porcen_promo = isset($_POST['porcen_promo']) && !empty($_POST['porcen_promo']) ? $_POST['porcen_promo'] : null;
$id_promo = isset($_POST['id_promo']) && !empty($_POST['id_promo']) ? $_POST['id_promo'] : null;

$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO cad_descontos (nomepromocao, iniciopromo, fimpromo, cod_produto, produto, porcen_promo) 
    VALUE (?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD 
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJECTION 
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP

    $stmt = $conn->prepare($sql);

    // O função bind_param insere as variveis no lugar das '?'
    // O primeiro parametro é o tipo do dado, os demais são apenas as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decaimais), s = texto(com tudo que não é numero)
    $stmt->bind_param(
        "sssssd",
        $nomepromocao,
        $iniciopromo,
        $fimpromo,
        $cod_produto ,
        $produto,
        $porcen_promo
    );
    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idCadCliente = $conn->insert_id;
            echo $idCadCliente;

            header('Location: /pi_gandara/comercial/cadDescontos.php');
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
}else if ($acao == "ALTERAR") {
    $sql = "UPDATE cad_descontos SET
        nomepromocao = ?,
        iniciopromo = ?,
        fimpromo = ?,
        cod_produto = ?,
        produto = ?,
        porcen_promo = ?
        WHERE id_promo = ?;";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssssdi",
        $nomepromocao,
        $iniciopromo,
        $fimpromo,
        $cod_produto ,
        $produto,
        $porcen_promo,
        $id_promo

    );

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/comercial/cadDescontos.php');
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
} else if($acao == "DELETAR"){
    // Neste bloco será excluido um registro que ja existe no BD

    $sql = "DELETE FROM cad_vendedores WHERE id_vendedor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idVendedor);

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
    }
else {
    //Se nenhuma das operações for solicitada, volta ára o inicio do site.
    // A função header modifica o cabeçalho do navegador
    // Ao passar a propriedade location, definimos para qual URL o navegador deve ir.
    header("Location: /site-pi/");
    exit;
}
?>
?>