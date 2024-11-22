<?php
require "../../utils/conexao.php";

$nomevendedor = isset($_POST['nomevendedor']) && !empty($_POST['nomevendedor']) ? $_POST['nomevendedor'] : null;
$cpfcnpj = isset($_POST['cpfcnpj']) && !empty($_POST['cpfcnpj']) ? $_POST['cpfcnpj'] : null;
$datanasc = isset($_POST['datanasc']) && !empty($_POST['datanasc']) ? $_POST['datanasc'] : null;
$cidade = isset($_POST['cidade']) && !empty($_POST['cidade']) ? $_POST['cidade'] : null;
$bairro = isset($_POST['bairro']) && !empty($_POST['bairro']) ? $_POST['bairro'] : null;
$rua = isset($_POST['rua']) && !empty($_POST['rua']) ? $_POST['rua'] : null;
$numero = isset($_POST['numero']) && !empty($_POST['numero']) ? $_POST['numero'] : null;
$complemento = isset($_POST['complemento']) && !empty($_POST['complemento']) ? $_POST['complemento'] : null;
$cep = isset($_POST['cep']) && !empty($_POST['cep']) ? $_POST['cep'] : null;
$porcentagem_comissao = isset($_POST['porcentagem_comissao']) && !empty($_POST['porcentagem_comissao']) ? $_POST['porcentagem_comissao'] : null;
$desconto_possivel = isset($_POST['desconto_possivel']) && !empty($_POST['desconto_possivel']) ? $_POST['desconto_possivel'] : null;
$tipo_vendedor = isset($_POST['tipo_vendedor']) && !empty($_POST['tipo_vendedor']) ? $_POST['tipo_vendedor'] : null;
$status_vendedor = isset($_POST['status_vendedor']) && !empty($_POST['status_vendedor']) ? $_POST['status_vendedor'] : null;
$idVendedor = isset($_POST['id_vendedor']) && !empty($_POST['id_vendedor']) ? $_POST['id_vendedor'] : null;

$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if ($acao == "INCLUIR") {

    $sql = "INSERT INTO cad_vendedores (nomevendedor, cpfcnpj, datanasc, cidade, bairro, rua, numero, complemento, cep,
    porcentagem_comissao, desconto_possivel, tipo_vendedor, status_vendedor) 
    VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD 
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJECTION 
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP

    $stmt = $conn->prepare($sql);

    // O função bind_param insere as variveis no lugar das '?'
    // O primeiro parametro é o tipo do dado, os demais são apenas as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decaimais), s = texto(com tudo que não é numero)
    $stmt->bind_param(
        "sssssssssddss",
        $nomevendedor,
        $cpfcnpj,
        $datanasc,
        $cidade,
        $bairro,
        $rua,
        $numero,
        $complemento,
        $cep,
        $porcentagem_comissao,
        $desconto_possivel,
        $tipo_vendedor,
        $status_vendedor
    );
    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idCadCliente = $conn->insert_id;
            echo $idCadCliente;

            header('Location: /pi_gandara/comercial/cadVendedores.php');
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
    $sql = "UPDATE cad_vendedores SET
        nomevendedor = ?,
        cpfcnpj = ?,
        datanasc = ?,
        cidade = ?,
        bairro = ?,
        rua = ?,
        numero = ?,
        complemento = ?,
        cep = ?,
        porcentagem_comissao = ?,
        desconto_possivel = ?,
        tipo_vendedor = ?,
        status_vendedor = ?
        WHERE id_vendedor = ?;";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssssssssddssi",
        $nomevendedor,
        $cpfcnpj,
        $datanasc,
        $cidade,
        $bairro,
        $rua,
        $numero,
        $complemento,
        $cep,
        $porcentagem_comissao,
        $desconto_possivel,
        $tipo_vendedor,
        $status_vendedor,
        $idVendedor

    );

    try {
        if ($stmt->execute()) {
            header('Location: /pi_gandara/comercial/cadVendedores.php');
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
}else if($acao == "DELETAR"){
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