<?php

require "../utils/conexao.php";

if (isset($_POST['fpNome']) && !empty($_POST['fpNome'])) {
    $fpNome = $_POST['fpNome'];
} else {
    $fpNome = "";
}

$fpNome = isset($_POST['fpNome']) && !empty($_POST['fpNome']) ? $_POST['fpNome'] : null;
$fpRg = isset($_POST['fpRg']) && !empty($_POST['fpRg']) ? $_POST['fpRg'] : null;
$fpCpf = isset($_POST['fpCpf']) && !empty($_POST['fpCpf']) ? $_POST['fpCpf'] : null;
$fpEndereco = isset($_POST['fpEndereco']) && !empty($_POST['fpEndereco']) ? $_POST['fpEndereco'] : "";
$fpNumeroCasa = isset($_POST['fpNumeroCasa']) && !empty($_POST['fpNumeroCasa']) ? $_POST['fpNumeroCasa'] : null;
$fpEstado = isset($_POST['fpEstado']) && !empty($_POST['fpEstado']) ? $_POST['fpEstado'] : null;
$fpCidade = isset($_POST['fpCidade']) && !empty($_POST['fpCidade']) ? $_POST['fpCidade'] : null;
$fpCep = isset($_POST['fpCep']) && !empty($_POST['fpCep']) ? $_POST['fpCep'] : null;
$fpEtnia = isset($_POST['fpEtnia']) ? $_POST['fpEtnia'] : null;
$fpGenero = isset($_POST['fpGenero']) && !empty($_POST['fpGenero']) ? $_POST['fpGenero'] : null;
$fpDataNascimento = isset($_POST['fpDataNascimento']) && !empty($_POST['fpDataNascimento']) ? $_POST['fpDataNascimento'] : null;
$fpEmail = isset($_POST['fpEmail']) && !empty($_POST['fpEmail']) ? $_POST['fpEmail'] : null;
$fpTelefone = isset($_POST['fpTelefone']) && !empty($_POST['fpTelefone']) ? $_POST['fpTelefone'] : null;
$fpCelular = isset($_POST['fpCelular']) && !empty($_POST['fpCelular']) ? $_POST['fpCelular'] : null;
$fpDependentes = isset($_POST['fpDependentes']) && !empty($_POST['fpDependentes']) ? $_POST['fpDependentes'] : null;
$fpIdadeDependentes = isset($_POST['fpIdadeDependentes']) && !empty($_POST['fpIdadeDependentes']) ? $_POST['fpIdadeDependentes'] : null;
$fpEstadoCivil = isset($_POST['fpEstadoCivil']) && !empty($_POST['fpEstadoCivil']) ? $_POST['fpEstadoCivil'] : null;
$fpCargo = isset($_POST['fpCargo']) && !empty($_POST['fpCargo']) ? $_POST['fpCargo'] : null;
$fpSetor = isset($_POST['fpSetor']) && !empty($_POST['fpSetor']) ? $_POST['fpSetor'] : null;
$fpDataAdimissao = isset($_POST['fpDataAdimissao']) && !empty($_POST['fpDataAdimissao']) ? $_POST['fpDataAdimissao'] : null;
$fpDataDemissao = isset($_POST['fpDataDemissao']) && !empty($_POST['fpDataDemissao']) ? $_POST['fpDataDemissao'] : null;
$fpSalarioBruto = isset($_POST['fpSalarioBruto']) && !empty($_POST['fpSalarioBruto']) ? $_POST['fpSalarioBruto'] : null;
$fpMetodoPagamento = isset($_POST['fpMetodoPagamento']) && !empty($_POST['fpMetodoPagamento']) ? $_POST['fpMetodoPagamento'] : null;
$fpChavePix = isset($_POST['fpChavePix']) && !empty($_POST['fpChavePix']) ? $_POST['fpChavePix'] : null;
$fpAgenciaConta = isset($_POST['fpAgenciaConta']) && !empty($_POST['fpAgenciaConta']) ? $_POST['fpAgenciaConta'] : null;
$fpObservacoes = isset($_POST['fpObservacoes']) && !empty($_POST['fpObservacoes']) ? $_POST['fpObservacoes'] : null;
$id = isset($_POST['idFuncionario']) && !empty($_POST['idFuncionario']) ? $_POST['idFuncionario'] : null;


$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if ($acao == "INCLUIR") {
    $sql = "INSERT INTO cadastro_funcionarios ( 
    fpNome, 
    fpRg, 
    fpCpf, 
    fpEndereco, 
    fpNumeroCasa, 
    fpEstado, 
    fpCidade, 
    fpCep, 
    fpEtnia, 
    fpGenero, 
    fpDataNascimento, 
    fpEmail, 
    fpTelefone, 
    fpCelular, 
    fpDependentes, 
    fpIdadeDependentes, 
    fpEstadoCivil, 
    fpCargo, 
    fpSetor, 
    fpDataAdimissao, 
    fpDataDemissao, 
    fpSalarioBruto, 
    fpMetodoPagamento, 
    fpChavePix, 
    fpAgenciaConta, 
    fpObservacoes) 
    VALUE ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
  
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssssssssssssssisssssssssss", 
    $fpNome, 
    $fpRg, 
    $fpCpf, 
    $fpEndereco, 
    $fpNumeroCasa, 
    $fpEstado, 
    $fpCidade, 
    $fpCep, 
    $fpEtnia, 
    $fpGenero, 
    $fpDataNascimento, 
    $fpEmail, 
    $fpTelefone, 
    $fpCelular, 
    $fpDependentes, 
    $fpIdadeDependentes, 
    $fpEstadoCivil, 
    $fpCargo, 
    $fpSetor, 
    $fpDataAdimissao, 
    $fpDataDemissao, 
    $fpSalarioBruto, 
    $fpMetodoPagamento, 
    $fpChavePix, 
    $fpAgenciaConta, 
    $fpObservacoes);

    try {
        if ($stmt->execute()) {
            
            $idFuncionario = $conn->insert_id;
            echo $idFuncionario;

            header("Location: /pi_gandara/folhaPagamento/cadFuncionarios.php");
        } else {
            echo $stmt->error;
        }
    } catch (Exception $e) {

        echo "Erro ao cadastrar!";

?>

<script>
    history.back();
</script>

<?php
    }

    $stmt->close();

    $conn->close();

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
} else if ($acao == "ALTERAR") {
    
    if ($senha != "") {
        $sql = "UPDATE cadastro_funcionarios SET 
    fpNome = ?,
    fpRg = ?,
    fpCpf = ?,
    fpEndereco = ?, 
    fpNumeroCasa = ?, 
    fpEstado = ?, 
    fpCidade = ?, 
    fpCep = ?, 
    fpEtnia = ?, 
    fpGenero = ?, 
    fpDataNascimento = ?, 
    fpEmail = ?, 
    fpCelular = ?, 
    fpDependentes = ?,
    fpIdadeDependentes = ?,
    fpEstadoCivil = ?,
    fpCargo = ?,
    fpSetor = ?,
    fpDataAdmissao = ?,
    fpDataDemissao = ?,
    fpSalarioBruto = ?,
    fpMetodoPagamento = ?,
    fpChavePix = ?,
    fpAgenciaConta = ?,
    fpObservacoes = ?,
    WHERE id = ?;";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sssssssssssssssisssssssssss", 
        $fpNome, 
        $fpRg, 
        $fpCpf, 
        $fpEndereco, 
        $fpNumeroCasa, 
        $fpEstado, 
        $fpCidade, 
        $fpCep, 
        $fpEtnia, 
        $fpGenero, 
        $fpDataNascimento, 
        $fpEmail, 
        $fpTelefone, 
        $fpCelular, 
        $fpDependentes, 
        $fpIdadeDependentes, 
        $fpEstadoCivil, 
        $fpCargo, 
        $fpSetor, 
        $fpDataAdimissao, 
        $fpDataDemissao, 
        $fpSalarioBruto, 
        $fpMetodoPagamento, 
        $fpChavePix, 
        $fpAgenciaConta, 
        $fpObservacoes, 
        $id);
    } else {

        $sql = "UPDATE cadastro_funcionarios SET 
    fpNome = ?,
    fpRg = ?,
    fpCpf = ?,
    fpEndereco = ?, 
    fpNumeroCasa = ?, 
    fpEstado = ?, 
    fpCidade = ?, 
    fpCep = ?, 
    fpEtnia = ?, 
    fpGenero = ?, 
    fpDataNascimento = ?, 
    fpEmail = ?, 
    fpCelular = ?, 
    fpDependentes = ?,
    fpIdadeDependentes = ?,
    fpEstadoCivil = ?,
    fpCargo = ?,
    fpSetor = ?,
    fpDataAdmissao = ?,
    fpDataDemissao = ?,
    fpSalarioBruto = ?,
    fpMetodoPagamento = ?,
    fpChavePix = ?,
    fpAgenciaConta = ?,
    fpObservacoes = ?,
    WHERE id = ?;";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sssssssssssssssisssssssssss", 
        $fpNome, 
        $fpRg, 
        $fpCpf, 
        $fpEndereco, 
        $fpNumeroCasa, 
        $fpEstado, 
        $fpCidade, 
        $fpCep, 
        $fpEtnia, 
        $fpGenero, 
        $fpDataNascimento, 
        $fpEmail, 
        $fpTelefone, 
        $fpCelular, 
        $fpDependentes, 
        $fpIdadeDependentes, 
        $fpEstadoCivil, 
        $fpCargo, 
        $fpSetor, 
        $fpDataAdimissao, 
        $fpDataDemissao, 
        $fpSalarioBruto, 
        $fpMetodoPagamento, 
        $fpChavePix, 
        $fpAgenciaConta, 
        $fpObservacoes, 
        $idFuncionario);
    }

    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $iFuncionario = $conn->insert_id;
            echo $idFuncionario;

            header("Location: /pi_gandara/folhaPagamento/cadFuncionarios.php");
        } else {
            echo $stmt->error;
        }
    } catch (Exception $e) {

        echo "Erro ao atualizar!";

        //Vamos utilizar JS para poder recuperar os dados digitados

    ?>

<script>
    history.back();
</script>

<?php
    }

    // Fecha o prepared statment
    $stmt->close();
    // Fecha a conexão
    $conn->close();
} else if ($acao == "DELETAR") {
    // Neste bloco será excluido um registro que já existe no BD.

    $sql = "DELETE FROM cadastro_funcionarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

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
    // Fecha o Prepared Statament
    $stmt->close();
    // Fecha a conexão
    $conn->close();
} else {
    // Se nenhuma das operações for solicitada, volta para o inicio do site.
    // A função header modifica o cabeçalho do navegador
    // Ao passar a propriedade location, definimos para qual URL o navegador deve ir.
    header("Location: /pi_gandara/");
    exit;
}

?>