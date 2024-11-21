<?php
require "../../utils/conexao.php";

$nometransportador = isset($_POST['nometransportador']) && !empty($_POST['nometransportador']) ? $_POST['nometransportador'] : null;
$cpfcnpj_transportador = isset($_POST['cpfcnpj_transportador']) && !empty($_POST['cpfcnpj_transportador']) ? $_POST['cpfcnpj_transportador'] : null;
$modeloveiculo = isset($_POST['modeloveiculo']) && !empty($_POST['modeloveiculo']) ? $_POST['modeloveiculo'] : null;
$status_transportador = isset($_POST['status_transportador']) && !empty($_POST['status_transportador']) ? $_POST['status_transportador'] : null;
$estado = isset($_POST['estado']) && !empty($_POST['estado']) ? $_POST['estado'] : null;
$volume = isset($_POST['volume']) && !empty($_POST['volume']) ? $_POST['volume'] : null;
$placa = isset($_POST['placa']) && !empty($_POST['placa']) ? $_POST['placa'] : null;
$rntrc = isset($_POST['rntrc']) && !empty($_POST['rntrc']) ? $_POST['rntrc'] : null;
$id_transportador = isset($_POST['id_transportador']) && !empty($_POST['id_transportador']) ? $_POST['id_transportador'] : null;

$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO cad_transportadores (nometransportador, cpfcnpj_transportador, modeloveiculo, 
    status_transportador, estado, volume, placa, rntrc) 
    VALUE (?, ?, ?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD 
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJECTION 
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP

    $stmt = $conn->prepare($sql);

    // O função bind_param insere as variveis no lugar das '?'
    // O primeiro parametro é o tipo do dado, os demais são apenas as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decaimais), s = texto(com tudo que não é numero)
    $stmt->bind_param(
        "ssssssss",
        $nometransportador,
        $cpfcnpj_transportador,
        $modeloveiculo,
        $status_transportador,
        $estado,
        $volume,
        $placa,
        $rntrc
    );
    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idCadCliente = $conn->insert_id;
            echo $idCadCliente;

            header('Location: /pi_gandara/comercial/cadTransportadores.php');
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
    $sql = "UPDATE cad_transportadores SET
        nometransportador = ?,
        cpfcnpj_transportador = ?,
        modeloveiculo = ?,
        status_transportador = ?,
        estado = ?,
        volume = ?,
        placa = ?,
        rntrc = ?
        WHERE id_transportador = ?;";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssssssi",
        $nometransportador,
        $cpfcnpj_transportador,
        $modeloveiculo,
        $status_transportador,
        $estado,
        $volume,
        $placa,
        $rntrc,
        $id_transportador

    );

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/comercial/cadTransportadores.php');
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
}
?>