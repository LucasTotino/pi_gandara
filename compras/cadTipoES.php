<?php
require '../utils/conexao.php';
// Verifica se veio um id na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";
// Caso tenha um ID faz A busca do Usuario no BD
if ($id) {
    $sql = "SELECT * FROM cad_nat_financeira WHERE id=?;";
    $stmt = $conn->prepare($sql);
    // Troca o ? pelo ID que veio na URL
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $dados = $stmt->get_result();

    // Verifica se encontrou o usuario ou se ele existe no BD
    if ($dados->num_rows > 0) {
        // Coloca os dados do usuário em uma variavel como array
        $natFin = $dados->fetch_assoc();
    } else {
        // Se não encontrou um usuario retorna para a página anterior.
?>

        <script>
            history.back();
        </script>
<?php
    }
}

// Seleciona apenas os campos que serão usados
$sql = " SELECT  	id, cod_nat, descricao, cod_pai, tipo_nat, data_inclusao, mov_bancaria FROM cad_nat_financeira;";

// Envia o SQL para o Prepare Statement:
$stmt = $conn->prepare($sql);

//Executa a consulta SQL
$stmt->execute();

//Pega o resultado e adiciona em uma variavel
$dados = $stmt->get_result();

$nivel = array(
    'Pessoa Juridica', // Posição 0
    'Pessoa Fisica' //Posição 1
);
$corNivel = array(
    'badge-danger', // Posição 0
    'badge-primary' // Posição 1
)
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/pi_gandara/css/style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Cadastro de Tipos de Entrada e Saída</title>
</head>


<body>
    <style>
        .TabControl {
            width: auto;
            overflow: hidden;
            height: auto;
        }

        .TabControl #header {
            width: 100%;
            overflow: hidden;
            cursor: hand
        }

        .TabControl #content {
            width: 100%;
            overflow: hidden;
            height: 100%;
        }

        .TabControl .abas {
            display: inline;
        }

        .TabControl .abas li {
            float: left
        }

        .aba {
            width: 100px;
            height: 30px;
            border: solid 1px;
            border-radius: 5px 5px 0 0;
            text-align: center;
            padding-top: 5px;
            background: white;
        }

        .ativa {
            width: 100px;
            height: 30px;
            border: solid 1 px;
            border-radius: 5px 5px 0 0;
            text-align: center;
            padding-top: 5px;
            background: #f39426de;
        }

        .ativa span,
        .selected span {
            color: #fff
        }

        .TabControl #content {
            background: white;
        }

        .TabControl .conteudo {
            width: 100%;
            background: white;
            display: none;
            height: 100%;
            color: #fff
        }

        .selected {
            width: 100px;
            height: 30px;
            border: solid 1 px;
            border-radius: 5px 5px 0 0;
            text-align: center;
            padding-top: 5px;
            background: #f39426de;
        }
    </style>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>
    <main>
        <h1 style="text-align:center;">Cadastro de Tipo de Entrada/Saída</h1>

        <div class="container">
            <div class="card card-cds">
                <form action="/onstudies/usuarios/iu_usuario.php" method="POST"><!-- Inicio Formulário -->
                    <div class="form-group">
                        <!-- Código e Descrição TES -->
                        <div class="form-row justify-content-center mt-2">
                            <div class="col-sm-2">
                                <label for="nome">Código TES</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                            <div class="col-sm-3">
                                <label for="cpf">Descrição</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" onkeypress="mascara('###.###.###-##', this)">
                            </div>
                        </div>

                        <!-- Tab links -->
                        <div class="TabControl m-3 mt-3">
                            <div id="header">
                                <ul class="abas">
                                    <li>
                                        <div class="aba">
                                            <span>ICMS</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="aba">
                                            <span>PIS</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="aba">
                                            <span>Cofins</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="aba">
                                            <span>IPI</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="aba">
                                            <span>CFOP</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="aba">
                                            <span>Administrativo</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="content" class="mt-3">
                                <div class="conteudo icms">
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="nivel_acesso" class="text-danger font-weight-bold">Aliquota %:</label>
                                            <input type="text" class="form-control" id="aliquota" name="aliquota">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido" class="text-danger font-weight-bold"> Redução de Base de Cálculo %:</label>
                                            <input type="text" class="form-control" id="reduzido" name="reduzido">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido_aliquota" class="text-danger font-weight-bold">Redução Aliquota %:</label>
                                            <input type="text" class="form-control" id="reduzido_aliquota" name="reduzido_aliquota">
                                        </div>
                                    </div>
                                </div>
                                <div class="conteudo pis">
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="nivel_acesso" class="text-danger font-weight-bold">Aliquota %:</label>
                                            <input type="text" class="form-control" id="aliquota" name="aliquota">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido" class="text-danger font-weight-bold">Aliquota Substituição Tributária %</label>
                                            <input type="text" class="form-control" id="reduzido" name="reduzido">
                                        </div>
                                    </div>
                                </div>
                                <div class="conteudo cofins">
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="nivel_acesso" class="text-danger font-weight-bold">Aliquota %:</label>
                                            <input type="text" class="form-control" id="aliquota" name="aliquota">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido" class="text-danger font-weight-bold">Aliquota Substituição Tributária %</label>
                                            <input type="text" class="form-control" id="reduzido" name="reduzido">
                                        </div>
                                    </div>
                                </div>
                                <div class="conteudo ipi">
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="nivel_acesso" class="text-danger font-weight-bold">Aliquota %:</label>
                                            <input type="text" class="form-control" id="aliquota" name="aliquota">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido" class="text-danger font-weight-bold">Credita IPI</label>
                                            <input type="checkbox" class="form-control" id="reduzido" name="reduzido">
                                        </div>
                                    </div>
                                </div>
                                <div class="conteudo cfop">
                                    Conteúdo da aba 5
                                </div>
                                <div class="conteudo administrativo">
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido" class="text-danger font-weight-bold">Movimenta Estoque</label>
                                            <input type="checkbox" class="form-control" id="reduzido" name="reduzido">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido" class="text-danger font-weight-bold">Gera Financeiro</label>
                                            <input type="checkbox" class="form-control" id="reduzido" name="reduzido">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido" class="text-danger font-weight-bold">Atualiza Custo Médio</label>
                                            <input type="checkbox" class="form-control" id="reduzido" name="reduzido">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido" class="text-danger font-weight-bold">Necessita Conferência</label>
                                            <input type="checkbox" class="form-control" id="reduzido" name="reduzido">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido" class="text-danger font-weight-bold">Atualiza Último Preço da Compra</label>
                                            <input type="checkbox" class="form-control" id="reduzido" name="reduzido">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido" class="text-danger font-weight-bold">Calcula ICMS ST</label>
                                            <input type="checkbox" class="form-control" id="reduzido" name="reduzido">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="reduzido" class="text-danger font-weight-bold">Tipo Documento</label>
                                            <select class="form-control" id="nivel_acesso" name="nivel_acesso">
                                                <option value=""> -- ESCOLHA -- </option>
                                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 1) ? "selected" : null ?>
                                                    value="1">Usuário</option>
                                                <option <?= (isset($_GET['id']) && $user['nivel_acesso'] == 0) ? "selected" : null ?>
                                                    value="0">Administrador</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="nivel_acesso" class="text-danger font-weight-bold">Informações Adicionais:</label>
                                            <input type="text" class="form-control" id="aliquota" name="aliquota">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Botões -->
                        <div class="form-row justify-content-center">
                            <div class="col-sm-3 mt-3">
                                <button type="submit" name="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                            <div class="col-sm-3 mt-3">
                                <button type="reset" class="btn btn-warning">Cancelar</button>
                            </div>
                            <div class="col-sm-3 mt-3">
                                <a href="/pi_gandara/compras/index.php"><button type="button" class="btn btn-danger">Voltar</button></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Exibir o conteúdo da primeira aba por padrão
            $("#content .conteudo").hide();
            $("#content .conteudo.icms").show(); // Mostra o conteúdo da aba ICMS
            $(".abas li:first div").addClass("selected");

            $(".aba").click(function() {
                $(".aba").removeClass("selected");
                $(this).addClass("selected");
                var indice = $(this).parent().index();

                // Esconde todos os conteúdos
                $("#content .conteudo").hide();

                // Mostra o conteúdo correspondente à aba clicada
                switch (indice) {
                    case 0:
                        $("#content .conteudo.icms").show();
                        break;
                    case 1:
                        $("#content .conteudo.pis").show();
                        break;
                    case 2:
                        $("#content .conteudo.cofins").show();
                        break;
                    case 3:
                        $("#content .conteudo.ipi").show();
                        break;
                    case 4:
                        $("#content .conteudo.cfop").show();
                        break;
                    case 5:
                        $("#content .conteudo.administrativo").show();
                        break;
                }
            });

            // Efeito hover para as abas
            $(".aba").hover(
                function() {
                    $(this).addClass("ativa");
                },
                function() {
                    $(this).removeClass("ativa");
                }
            );
        });
    </script>
</body>

</html>

<!-- link de referência: https://si14.com.br/manual/como-cadastrar-t-e-s-tipo-de-entrada-e-saida/ -->