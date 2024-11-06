<?php
require "../../utils/conexao.php";

// Ex: colocar o valor do POST se ele existir, se não deixar em branco.

// variavel = condição ? se VERDADEIRO : se FALSE;
$codNat = isset($_POST['cod_nat']) && !empty($_POST['cod_nat']) ? $_POST['cod_nat'] : null;
$codPai = isset($_POST['cod_pai']) && !empty($_POST['cod_pai']) ? $_POST['cod_pai'] : null;
$descricao = isset($_POST['descricao']) && !empty($_POST['descricao']) ? $_POST['descricao'] : null;
$dataInclusao = isset($_POST['data_inclusao']) && !empty($_POST['data_inclusao']) ? $_POST['data_inclusao'] : null;
$tipoNat = isset($_POST['tipo_nat']) && !empty($_POST['tipo_nat']) ? $_POST['tipo_nat'] : null;
$movBancaria = isset($_POST['mov_bancaria']) && !empty($_POST['mov_bancaria']) ? $_POST['mov_bancaria'] : null;
$usoNat = isset($_POST['uso_nat']) && !empty($_POST['uso_nat']) ? $_POST['uso_nat'] : null;
$idNatFinanceira = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

// Verificamos qual operaçaõ está sendo feita.

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO cad_nat_financeira (cod_nat, cod_pai, descricao, data_inclusao, tipo_nat, mov_bancaria, uso_nat) 
    VALUE (?, ?, ?, ?, ?, ?, ?);";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssiii",
        $codNat,
        $codPai,
        $descricao,
        $dataInclusao,
        $tipoNat,
        $movBancaria,
        $usoNat
    );

    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idCadNatFin = $conn->insert_id;
            echo $idCadNatFin;

            header('Location: /pi_gandara/compras/cadNatFinanceira.php');
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
    $sql = "UPDATE cad_nat_financeira SET
        cod_nat = ?,
        cod_pai = ?,
        descricao = ?, 
        data_inclusao = ?,
        tipo_nat = ?,
        mov_bancaria = ?, 
        uso_nat = ?
        WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssiiii",
        $codNat,
        $codPai,
        $descricao,
        $dataInclusao,
        $tipoNat,
        $movBancaria,
        $usoNat,
        $idNatFinanceira
    );
    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/compras/cadNatFinanceira.php');
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

    $sql = "DELETE FROM cad_nat_financeira WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idNatFinanceira);
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
