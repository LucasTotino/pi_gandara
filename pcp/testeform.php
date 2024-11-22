<?php
require '../utils/conexao.php';
// Verifica se veio um ID na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";

// Caso tenha um ID faz a busca do usuário no BD
if ($id) {
    $sql = "SELECT * FROM produtos WHERE id_produtos=?;";
    $stmt = $conn->prepare($sql);
    // Troca o ? pelo ID que veio na URL
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $dados = $stmt->get_result();

    // Verifica se encontrou o usuario ou se ele existe no BD
    if ($dados->num_rows > 0) {
        // Coloca os dados do usuário em uma variavel como array
        $user = $dados->fetch_assoc();
    } else {
        // Se não encontrou um usuário retorna para a página anterior.
        ?>
        <script>
            history.back();
        </script>
        <?php
    }

    // Como converter data do JP para PT-BR
    // <?= date("d/m/Y", strtotime($user['data_nascimento']))
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>

</head>

<body>

    <!--------------------- Início do menu ---------------------->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/site-pi/dashbourd.php"><img src="/site-pi/imagens/icone.png" alt=""
                style="width: 50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <!--- Início Menu lista --->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Usuários
                    </a>
                    <!--- Fim do botão de dropDown --->

                    <!--- Inicio da caixa de listagem --->

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/site-pi/usuarios/index.php">Listagem de Usuários</a>
                        <a class="dropdown-item" href="/site-pi/usuarios/iu_usuario.php">Cadastro de Usuários</a>
                    </div>

                    <!--- Fim da caixa de listagem --->
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Produtos
                    </a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/site-pi/produtos/index.php">Listagem de Produtos</a>
                        <a class="dropdown-item" href="/site-pi/produtos/iu_produtos.php">Cadastro de Produtos</a>
                    </div>

                </li>

                <!--- Fim do Menu Lista --->

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a
                        href="/site-pi/utils/dashbourd.php">Sair</a></button>
            </form>
        </div>
    </nav>

    <!--------------------- Fim do menu ------------------------>

    <!--------------------- Início Conteúdo principal ---------------->

    <div class="container">

        <!--------------------- Início Formulário ------------------->
        <form id="userForm" action="/site-pi/bd/bd-produtos.php" method="POST" class="mt-5">
            <h1>
                <?= ($id) ? "Alteração  de produtos" : "Cadastro de produtos" ?>
            </h1>
            <input type="hidden" id="id_produtos" name="id_produtos"
                value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
            <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
            <div class="card p-3 bg-dark text-white">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-row">
                                    <!--------------------- Nome do produto --------------------->
                                    <div class="form-group col-md-12">
                                        <label for="nomeProduto">Nome do Produto:</label>
                                        <input type="text" name="nomeProduto" id="nomeProduto" class="form-control"
                                            value="<?= ($id) ? $user['nomeProduto'] : null ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!--------------------- Tamanho --------------------->
                                    <div class="form-group col-md-12">
                                        <label for="tamanho">Tamanho</label>
                                        <select id="tamanho" class="form-control" name="tamanho" required>
                                            <option value="">--Escolha--</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "PP") ? "selected" : null ?> value="PP">PP</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "P") ? "selected" : null ?> value="P">P</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "M") ? "selected" : null ?> value="M">M</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "G") ? "selected" : null ?> value="G">G</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "GG") ? "selected" : null ?> value="GG">GG</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "XG") ? "selected" : null ?> value="XG">XG</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "XXG") ? "selected" : null ?> value="XXG">XXG</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "36") ? "selected" : null ?> value="36">36</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "38") ? "selected" : null ?> value="38">38</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "40") ? "selected" : null ?> value="40">40</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "42") ? "selected" : null ?> value="42">42</option>
                                            <option <?= (isset($_GET['id']) && $user["tamanho"] == "44") ? "selected" : null ?> value="44">44</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!--------------------- Marca --------------------->
                                    <div class="form-group col-md-12">
                                        <label for="marca">Marca</label>
                                        <input type="text" name="marca" class="form-control" id="marca"
                                            value="<?= ($id) ? $user['marca'] : null ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!--------------------- Cor --------------------->
                                    <div class="form-group col-md-12 text-center">
                                        <label for="cor">Cor</label>
                                        <input type="color" name="cor" id="cor" class="form-control-color"
                                            value="<?= ($id) ? $user['cor'] : null ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group">
                                        <label for="preco">Preço de venda</label>
                                        <input type="price" name="preco" id="preco" class="form-control text-center"
                                            required value="<?= ($id) ? $user['preco'] : null ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group">
                                        <label for="imagem">Imagem do produto</label>
                                        <input class="file-chooser" type="file" accept="image/*" name="imagem"
                                            value="../imagens/produtos/<?= ($id) ? $user['imagem'] : null ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <img class="preview-img" style="max-width: 100%;">
                        </div>
                    </div>
                </div>

                <script>
                    const $ = document.querySelector.bind(document);
                    const previewImg = $('.preview-img');
                    const fileChooser = $('.file-chooser');

                    fileChooser.onchange = e => {
                        const fileToUpload = e.target.files.item(0);
                        const reader = new FileReader();

                        // evento disparado quando o reader terminar de ler 
                        reader.onload = e => previewImg.src = e.target.result;

                        // solicita ao reader que leia o arquivo 
                        // transformando-o para DataURL. 
                        // Isso disparará o evento reader.onload.
                        reader.readAsDataURL(fileToUpload);
                    };
                </script>

                <div class="row">
                    <div class="col-md-4 d-flex justify-content-start">
                        <a href="/site-pi/produtos/index.php" class="btn btn-link" id="btnBack">Voltar</a>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </div>

            </div>
        </form>

        <!--------------------- Fim do Formulário ------------------->

    </div>

    <!--------------------- Fim conteúdo principal ---------------->

    <!-------------------- Início Rodapé --------------------->

    <footer class="footer mt-auto pt-3 bg-dark text-white">
        <div class="text-center p-4">
            <b> Projeto desenvolvido por: Otávio Baio e João Victor </b>
        </div>
    </footer>

    <!-------------------- Fim do Rodapé --------------------->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>

</body>

</html>
