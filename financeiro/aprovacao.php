<?php
require '../utils/conexao.php';
// Verifica se veio um id na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";
// Caso tenha um ID faz A busca do Produto no BD
if ($id) {
    $sql = "SELECT * FROM cad_novobanco WHERE id=?;";
    $stmt = $conn->prepare($sql);
    // Troca o ? pelo ID que veio na URL
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $dados = $stmt->get_result();

    // Verifica se encontrou o Produto ou se ele existe no BD
    if ($dados->num_rows > 0) {
        // Coloca os dados do usuário em uma variavel como array
        $aprovacao = $dados->fetch_assoc();
    } else {
        // Se não encontrou um Produto retorna para a página anterior.
?>

        <script>
            history.back();
        </script>
<?php
    }
}

// Prepara a consulta SQL
$sql = "SELECT * FROM cad_novobanco;";

// Seleciona apenas os campos que serão usados
$sql_eficiente = " SELECT id, nomeInstituicao, numeroConta, codBanco, tipoConta, moeda, anotacoes FROM cad_novobanco;";

// Envia o SQL para o Prepare Statement:
$stmt = $conn->prepare($sql);

//Executa a consulta SQL
$stmt->execute();

//Pega o resultado e adiciona em uma variavel
$dados = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Aprovação de Cotação</title>
</head>
<body>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>
    <div class="container mt-5">
        <h1 class="text-center">Aprovação de Cotação</h1>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID da Cotação</th>
                    <th>Fornecedor</th>
                    <th>Valor</th>
                    <th>Data de Solicitação</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        // Laço de repetição
                        // Que irá exibir uma linha da tabela para cada registro no bd
                        // Adiciona cada registro na variavel linha como um Arrey.
                        while ($linha = $dados->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $linha['id_sol_compra'] ?></td>
                            <td><?= $linha['produto'] ?></td>
                            <td><?= $linha['descricao'] ?></td>
                            <td><?= $linha['unidade'] ?></td>
                            <td><?= $linha['cod_produto'] ?></td>
                            <td><?= $linha['produto'] ?></td>
                            <td><?= $linha['descricao'] ?></td>
                            <td>
                                <!-- Chamo a página do formulario e envio o Id do Produto que será alterado-->
                                <a href="cadProduto.php?id=<?= $linha['id'] ?>" class="btn btn-warning">Editar</a>
                                <button class="btn btn-danger btn-excluir" data-table="produto" data-id="<?= $linha['id'] ?>">Excluir</button>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
            </tbody>
        </table>

        <div class="mt-4">
            <h5>Adicionar Comentário</h5>
            <textarea class="form-control" rows="3" placeholder="Digite seu comentário aqui..."></textarea>
            <button class="btn btn-primary mt-2">Enviar Comentário</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-excluir').click(function() {
                var userId = $(this).data('id');
                var tabela = $(this).data('table');

                var confirma = confirm(`Você tem certeza que deseja excluir o Produto [ ${userId} ] ?`);

                if (confirma) {
                    $.ajax({
                        url: `/pi_gandara/compras/bd/bd_${tabela}.php`,
                        type: 'POST',
                        data: {
                            acao: "DELETAR",
                            id_usuario: userId
                        },
                        success: function(response) {
                            var result = JSON.parse(response);
                            if (result.status === "sucesso") {
                                alert(result.message);
                                location.reload();
                            } else {
                                alert(result.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr);
                            alert("Ocorreu um erro: " + error);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>