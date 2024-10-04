<?php
require "../../utils/conexao.php";

// IF normal
if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = $_POST['nome'];
} else {
    $nome = null;
}
// IF TERNÁRIO
// Usado quando há uma condição para preenchimento de uma variavel.
// Ex: colocar o valor do POST se ele existir, se não deixar em branco.

// variavel = condição ? se VERDADEIRO : se FALSE;
$email = isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : null;
$celular = isset($_POST['celular']) && !empty($_POST['celular']) ? $_POST['celular'] : null;
$dataNascimento = isset($_POST['data_nascimento']) && !empty($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null;
$cpf = isset($_POST['cpf']) && !empty($_POST['cpf']) ? $_POST['cpf'] : null;
$nivelAcesso = isset($_POST['nivel_acesso']) ? $_POST['nivel_acesso'] : null;
$cep = isset($_POST['cep']) && !empty($_POST['cep']) ? $_POST['cep'] : null;
$endereco = isset($_POST['endereco']) && !empty($_POST['endereco']) ? $_POST['endereco'] : null;
$numero = isset($_POST['numero']) && !empty($_POST['numero']) ? $_POST['numero'] : null;
$complemento = isset($_POST['complemento']) && !empty($_POST['complemento']) ? $_POST['complemento'] : null;
$cidade = isset($_POST['cidade']) && !empty($_POST['cidade']) ? $_POST['cidade'] : null;
$estado = isset($_POST['estado']) && !empty($_POST['estado']) ? $_POST['estado'] : null;
$senha = isset($_POST['senha']) && !empty($_POST['senha']) ? $_POST['senha'] : null;
$confirmaSenha = isset($_POST['confirma_senha']) && !empty($_POST['confirma_senha']) ? $_POST['confirma_senha'] : null;
$idUsuario = isset($_POST['id_usuario']) && !empty($_POST['id_usuario']) ? $_POST['id_usuario'] : null;

$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

// Verificamos qual operaçaõ está sendo feita .

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO usuarios (nome, email, celular, data_nascimento, cpf, nivel_acesso, 
    cep, endereco, numero, complemento, cidade, estado, senha) 
    VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD 
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJECTION 
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP

    $stmt = $conn->prepare($sql);

    // O função bind_param insere as variveis no lugar das '?'
    // O primeiro parametro é o tipo do dado, os demais são apenas as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decaimais), s = texto(com tudo que não é numero)
    $stmt->bind_param(
        "sssssisssssss",
        $nome,
        $email,
        $celular,
        $dataNascimento,
        $cpf,
        $nivelAcesso,
        $cep,
        $endereco,
        $numero,
        $complemento,
        $cidade,
        $estado,
        $senha,
    );

    // A função execute envia o script SQL todo arrumado para o BD, com as variaveis 
    // nos lugares das ?.

    try {
        if ($stmt->execute()) { 
            // Pega o numero do ID que foi inserido no BD
            $idCadastro = $conn->insert_id;
            echo $idCadastro;

            header('Location: /pi_gandara/compras/cadUsuario.php');
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
    if ($senha != "") {
        $sql = "UPDATE usuarios SET
    nome = ?,
    email = ?,
    celular = ?,
    data_nascimento = ?,
    cpf = ?,
    nivel_acesso = ?,
    cep = ?,
    endereco = ?,
    numero = ?,
    complemento = ?,
    cidade = ?,
    estado = ?,
    senha = ? 
    WHERE id_usuario = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssssisssssssi",
            $nome,
            $email,
            $celular,
            $dataNascimento,
            $cpf,
            $nivelAcesso,
            $cep,
            $endereco,
            $numero,
            $complemento,
            $cidade,
            $estado,
            $senha,
            $idUsuario
        );
    } else {
        $sql = "UPDATE usuarios SET
        nome = ? ,
        email = ? ,
        celular = ? ,
        data_nascimento = ?,
        cpf = ?,
        nivel_acesso = ?,
        cep = ?,
        endereco = ?,
        numero = ?,
        complemento = ?,
        cidade = ?,
        estado = ? 
        WHERE id_usuario = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssssissssssi",
            $nome,
            $email,
            $celular,
            $dataNascimento,
            $cpf,
            $nivelAcesso,
            $cep,
            $endereco,
            $numero,
            $complemento,
            $cidade,
            $estado,
            $idUsuario
        );
    }
    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/compras/cadUsuario.php');
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
    
    $sql = "DELETE  FROM usuarios WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
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
    header("Location: /pi_gandara/");
    exit;
}
