<?php
require "../../utils/conexao.php";

$dataemissao = isset($_POST['dataemissao']) && !empty($_POST['dataemissao']) ? $_POST['dataemissao'] : null;
$cpf_cnpj = isset($_POST['cpf_cnpj']) && !empty($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : null;
$nomecliente = isset($_POST['nome']) && !empty($_POST['nome']) ? $_POST['nome'] : null;
$estado = isset($_POST['estado']) && !empty($_POST['estado']) ? $_POST['estado'] : null;
$logradouro = isset($_POST['logradouro']) && !empty($_POST['logradouro']) ? $_POST['logradouro'] : null;
$email = isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : null;
$complemento = isset($_POST['complemento']) && !empty($_POST['complemento']) ? $_POST['complemento'] : null;
$id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
$produto = isset($_POST['produto']) && !empty($_POST['produto']) ? $_POST['produto'] : null;
$quantidade = isset($_POST['quantidade']) && !empty($_POST['quantidade']) ? $_POST['quantidade'] : null;
$valor = isset($_POST['valor']) && !empty($_POST['valor']) ? $_POST['valor'] : null;
$valortotal = isset($_POST['valortotal']) && !empty($_POST['valortotal']) ? $_POST['valortotal'] : null;
$idNota = isset($_POST['id_nfse']) && !empty($_POST['id_nfse']) ? $_POST['id_nfse'] : null;

$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO cad_nfse (dataemissao, cpf_cnpj, nome, estado, logradouro, email, complemento, id,
    produto, quantidade, valor, valortotal)
    VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD 
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJECTION 
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP

    $stmt = $conn->prepare($sql);

    // O função bind_param insere as variveis no lugar das '?'
    // O primeiro parametro é o tipo do dado, os demais são apenas as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decaimais), s = texto(com tudo que não é numero)
    $stmt->bind_param(
        "sssssssisidd",
        $dataemissao,
        $cpf_cnpj,
        $nomecliente,
        $estado,
        $logradouro,
        $email,
        $complemento,
        $id,
        $produto,
        $quantidade,
        $valor,
        $valortotal 
    );
    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idCadNota = $conn->insert_id;
            echo $idCadNota;

            header('Location: /pi_gandara/comercial/cadNotaSaida.php');
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
    $sql = "UPDATE cad_nfse SET
        dataemissao = ?,
        cpf_cnpj = ?,
        nome = ?,
        estado = ?,
        logradouro = ?,
        email = ?,
        complemento = ?,
        id = ?,
        produto = ?,
        quantidade = ?,
        valor = ?,
        valortotal = ?
        WHERE id_nfse = ?;";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssssssisiddi",
        $dataemissao,
        $cpf_cnpj,
        $nomecliente,
        $estado,
        $logradouro,
        $email,
        $complemento,
        $id,
        $produto,
        $quantidade,
        $valor,
        $valortotal,
        $idNota

    );

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/comercial/cadNotaSaida.php');
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

    $sql = "DELETE FROM cad_venda WHERE id_venda = ?";
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