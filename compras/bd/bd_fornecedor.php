<?php
require "../../utils/conexao.php";

// Ex: colocar o valor do POST se ele existir, se não deixar em branco.

// variavel = condição ? se VERDADEIRO : se FALSE;
$nome = isset($_POST['nome']) && !empty($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : null;
$celular = isset($_POST['celular']) && !empty($_POST['celular']) ? $_POST['celular'] : null;
$cpf_cnpj = isset($_POST['cpf_cnpj']) && !empty($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : null;
$tipoFornecedor = isset($_POST['tipo_fornecedor']) ? $_POST['tipo_fornecedor'] : null;
$cep = isset($_POST['cep']) && !empty($_POST['cep']) ? $_POST['cep'] : null;
$logradouro = isset($_POST['logradouro']) && !empty($_POST['logradouro']) ? $_POST['logradouro'] : null;
$numero = isset($_POST['numero']) && !empty($_POST['numero']) ? $_POST['numero'] : null;
$complemento = isset($_POST['complemento']) && !empty($_POST['complemento']) ? $_POST['complemento'] : null;
$cidade = isset($_POST['cidade']) && !empty($_POST['cidade']) ? $_POST['cidade'] : null;
$estado = isset($_POST['estado']) && !empty($_POST['estado']) ? $_POST['estado'] : null;
$bairro = isset($_POST['bairro']) && !empty($_POST['bairro']) ? $_POST['bairro'] : null;
$idFornecedor = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

// Verificamos qual operaçaõ está sendo feita .

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO cad_fornecedor (nome, email, celular, cpf_cnpj, tipo_fornecedor, 
    cep, logradouro, numero, complemento, cidade, estado, bairro) 
    VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD 
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJECTION 
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP

    $stmt = $conn->prepare($sql);

    // O função bind_param insere as variveis no lugar das '?'
    // O primeiro parametro é o tipo do dado, os demais são apenas as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decaimais), s = texto(com tudo que não é numero)
    $stmt->bind_param(
        "ssssisssssss",
        $nome,
        $email,
        $celular,
        $cpf_cnpj,
        $tipoFornecedor, 
        $cep,
        $logradouro,
        $numero,
        $complemento,
        $cidade,
        $estado,
        $bairro
    );

    // A função execute envia o script SQL todo arrumado para o BD, com as variaveis 
    // nos lugares das ?.

    try {
        if ($stmt->execute()) { 
            // Pega o numero do ID que foi inserido no BD
            $idCadFornecedor = $conn->insert_id;
            echo $idCadFornecedor;

            header('Location: /pi_gandara/compras/cadFornecedor.php');
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
        $sql = "UPDATE cad_fornecedor SET
        nome = ?,
        email = ?,
        celular = ?,
        cpf_cnpj = ?,
        tipo_fornecedor = ?,
        cep = ?,
        logradouro = ?,
        numero = ?,
        complemento = ?,
        cidade = ?,
        estado = ?,
        bairro = ?
        WHERE id = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssisssssssi",
            $nome,
            $email,
            $celular,
            $cpf_cnpj,
            $tipoFornecedor,
            $cep,
            $logradouro,
            $numero,
            $complemento,
            $cidade,
            $estado,
            $bairro,
            $idFornecedor
        );
    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/compras/cadFornecedor.php');
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
    
    $sql = "DELETE FROM cad_fornecedor WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idFornecedor);
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