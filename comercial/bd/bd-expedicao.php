<?php
require "../../utils/conexao.php";

$id_venda = isset($_POST['id_venda']) && !empty($_POST['id_venda']) ? $_POST['id_venda'] : null;
$nome = isset($_POST['nome']) && !empty($_POST['nome']) ? $_POST['nome'] : null;
$nometransportador = isset($_POST['nometransportador']) && !empty($_POST['nometransportador']) ? $_POST['nometransportador'] : null;
$dataenvio = isset($_POST['dataenvio']) && !empty($_POST['dataenvio']) ? $_POST['dataenvio'] : null;
$idExpedicao = isset($_POST['id_expedicao']) && !empty($_POST['id_expedicao']) ? $_POST['id_expedicao'] : null;

$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO cad_expedicao (id_venda, nome, nometransportador, dataenvio) 
    VALUE (?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD 
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJECTION 
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP

    $stmt = $conn->prepare($sql);

    // O função bind_param insere as variveis no lugar das '?'
    // O primeiro parametro é o tipo do dado, os demais são apenas as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decaimais), s = texto(com tudo que não é numero)
    $stmt->bind_param(
        "isss",
        $id_venda,
        $nome,
        $nometransportador,
        $dataenvio
    );
    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idCadCliente = $conn->insert_id;
            echo $idCadCliente;

            header('Location: /pi_gandara/comercial/Expedicao.php');
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
    $sql = "UPDATE cad_expedicao SET
        id_venda = ?,
        nome = ?,
        nometransportador = ?,
        dataenvio = ?
        WHERE id_expedicao = ?;";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "isssi",
        $id_venda,
        $nome,
        $nometransportador,
        $dataenvio,
        $idExpedicao

    );

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/comercial/Expedicao.php');
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

    $sql = "DELETE FROM cad_vendas WHERE id_venda = ?";
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