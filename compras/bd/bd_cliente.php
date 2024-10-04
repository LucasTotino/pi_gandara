<?php
require "../../utils/conexao.php";

// IF normal
if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = $_POST['nome'];
} else {
    $nome = null;
}

// Ex: colocar o valor do POST se ele existir, se não deixar em branco.

// variavel = condição ? se VERDADEIRO : se FALSE;
$email = isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : null;
$celular = isset($_POST['celular']) && !empty($_POST['celular']) ? $_POST['celular'] : null;
$cpf_cnpj = isset($_POST['cpf_cnpj']) && !empty($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : null;
$tipoCliente = isset($_POST['tipo_cliente']) ? $_POST['tipo_cliente'] : null;
$cep = isset($_POST['cep']) && !empty($_POST['cep']) ? $_POST['cep'] : null;
$logradouro = isset($_POST['logradouro']) && !empty($_POST['logradouro']) ? $_POST['logradouro'] : null;
$numero = isset($_POST['numero']) && !empty($_POST['numero']) ? $_POST['numero'] : null;
$complemento = isset($_POST['complemento']) && !empty($_POST['complemento']) ? $_POST['complemento'] : null;
$cidade = isset($_POST['cidade']) && !empty($_POST['cidade']) ? $_POST['cidade'] : null;
$estado = isset($_POST['estado']) && !empty($_POST['estado']) ? $_POST['estado'] : null;
$idCliente = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;

$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

// Verificamos qual operaçaõ está sendo feita .

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO cad_cliente (nome, email, celular, cpf_cnpj, tipo_cliente, 
    cep, logradouro, numero, complemento, cidade, estado) 
    VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD 
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJECTION 
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP

    $stmt = $conn->prepare($sql);

    // O função bind_param insere as variveis no lugar das '?'
    // O primeiro parametro é o tipo do dado, os demais são apenas as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decaimais), s = texto(com tudo que não é numero)
    $stmt->bind_param(
        "ssssissssss",
        $nome,
        $email,
        $celular,
        $cpf_cnpj,
        $tipoCliente, 
        $cep,
        $logradouro,
        $numero,
        $complemento,
        $cidade,
        $estado,
    );

    // A função execute envia o script SQL todo arrumado para o BD, com as variaveis 
    // nos lugares das ?.

    try {
        if ($stmt->execute()) { 
            // Pega o numero do ID que foi inserido no BD
            $idCadastro = $conn->insert_id;
            echo $idCadastro;

            header('Location: /pi_gandara/compras/cadCliente.php');
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
        $sql = "UPDATE cad_cliente SET
        nome = ? ,
        email = ? ,
        celular = ? ,
        cpf_cnpj = ?,
        tipo_cliente = ?,
        cep = ?,
        logradouro = ?,
        numero = ?,
        complemento = ?,
        cidade = ?,
        estado = ? 
        WHERE id = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssissssssi",
            $nome,
            $email,
            $celular,
            $cpf_cnpj,
            $tipoCliente,
            $cep,
            $logradouro,
            $numero,
            $complemento,
            $cidade,
            $estado,
            $idCliente
        );
    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/compras/cadCliente.php');
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
    
    $sql = "DELETE  FROM cad_cliente WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idCliente);
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
