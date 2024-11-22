<?php

require '../utils/conexao.php';

//prepara a consulta SQL
$sql = "SELECT * FROM produtos;";

//Seleciona apenas os campos que serão usados
$sql_eficiente = "SELECT id_produtos, nomeProduto, tamanho, marca, cor, preco, imagem FROM produtos;";

//Envia o SQL para o prepare Statement
$stmt = $conn->prepare($sql);

//Executa a consulta SQL
$stmt->execute();

//Pega o resultado e adiciona em uma variavel
$dados = $stmt->get_result(); // somente com SQL generico

/*
Caso use o SQL Eficiente:

Liga os resultados a variaveis para serem utilizados no HTML
    Colocar na mesma ordem do Script SQL
    $stmt->bind_result($id_usuario, $nome, $email, $cpf, $celular, $nivel_acesso);

*/


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

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

    <!--------------------- Fim do menu ---------------------->

    <!--------------- Conteúdo Principal -------------->

    <div class="container mt-5">
        <div class="row">
            <h1 class="col-md-6">Listagem de produtos</h1>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="/site-pi/produtos/iu_produtos.php"><button type="submit"
                        class="btn btn-success my-3">Adicionar</button></a>
            </div>
        </div>

        <!----------- Tabela com os usuários cadastrados ------------>

        <div class="card p-3">
            <table class="table table-striped table-dark">
                <!------- Linha cabeçalho da tabela -------->
                <thead>
                    <tr>
                        <th scope="col">ID Produto</th>
                        <th scope="col">Nome Produto</th>
                        <th scope="col">Tamanho</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Imagem</th>
                    </tr>
                </thead>

                <!------- Fim da linha cabeçalho -------->

                <!------- Corpo da tabela, com as linhas dos usuários -------->
                <tbody>
                    <?php

                    //Aqui adicionamos o laço de repetição
                    //Que irá exibir uma linha da tabela para cada registro no BD
                    
                    //Adiciona cada registro na variavel linha com um array.
                    while ($linha = $dados->fetch_assoc()) {

                        ?>
                        <tr>
                            <td scope="row"><?= $linha['id_produtos'] ?></td>
                            <td><?= $linha['nomeProduto']; ?></td>
                            <td><?= $linha['tamanho']; ?></td>
                            <td><?= $linha['marca']; ?></td>
                            <td class="badge badge-pill" style="background-color: <?= $linha['cor']; ?>">
                            </td>
                            <td><?= number_format($linha['preco'], 2, ',', '.'); ?></td>
                            <td>
                                <img class='preview-img thumbnail' src="../imagens/produtos/<?= $linha['imagem']; ?>"
                                    alt="Imagem do Produto" style="width: 100px">
                            </td>
                            <td>
                                <a href="iu_produtos.php?id=<?= $linha['id_produtos'] ?>"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <button type="button" class="btn btn-danger btn-excluir btn-sm" data-table="produtos"
                                    data-id="<?= $linha['id_produtos'] ?>"> Excluir</button>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <!----------- Tabela com os usuários cadastrados ------------>

    </div>

    <!--------------- Conteúdo Principal -------------->


    <!-------------------- Início Rodapé --------------------->

    <footer class="footer mt-auto pt-3 bg-dark text-white">
        <div class="text-center p-4">
            <b> Projeto desenvolvido por: Otávio Baio e João Victor </b>
        </div>
    </footer>

    <!-------------------- Fim do Rodapé --------------------->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('.btn-excluir').click(function () {
                var idProdutos = $(this).data('id');
                var produtos = $(this).data('table');

                var confirma = confirm(`Você tem certeza que
                deseja excluir o usuário [ ${idProdutos} ] ?`);

                if (confirma) {
                    $.ajax({
                        url: `../bd/bd-${produtos}.php`,
                        type: 'POST',
                        data: {
                            acao: "DELETAR",
                            id_produtos: idProdutos
                        },
                        success: function (response) {
                            var result = JSON.parse(response);
                            console.log(result)
                            if (result.status === "sucesso") {
                                alert(result.message);
                                location.reload();
                                exit;
                            } else {
                                alert(result.message);
                    
                            }
                        },
                        error: function (xhr, status, error) {
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