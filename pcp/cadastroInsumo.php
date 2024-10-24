<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/pi_gandara/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Trabalho Gandara!</title>
</head>
<header>
    <?php
    include_once('../utils/menu.php');
    ?>
</header>

<body>

    <div class="container">
        <h4>Formulário onde será solicitado o cadastro do Insumo informando Nome código de Ref. Quantidade que será utilizada e medida de tempo</h4>
    </div>

    <main>
        <div class="container-1">
            <h1 style="text-align:center;">Cadastro de Insumos</h1>


            <form action="" method="POST"><!-- Inicio Formulário -->
                <div class="form-group">
                    <!-- Nome, CPF e Data Nascimento -->
                    <div class="form-row justify-content-center mt-2">
                        <div class="col-sm-6">
                            <label for="nomeInsumo">Nome do Insumo</label>
                            <input type="text" class="form-control" id="nomeInsumo" name="nomeInsumo">
                        </div>
                        <div class="col-sm-6">
                            <label for="codigoReferencia">Código de Referência</label>
                            <input type="text" class="form-control" id="codigoReferencia" name="codigoReferencia">
                        </div>
                    </div>

                    <!-- Celular e Email -->

                    <div class="form-row justify-content-center mt-2">
                        <div class="col-sm-4">
                            <label for="quantidadeInsumo">Quantidade utilizada</label>
                            <input type="text" class="form-control" id="quantidadeInsumo" name="quantidadeInsumo">
                        </div>

                        <div class="col-sm-4">
                            <label for="unidade">Unidade:</label>
                            <div class="input-group">
                                <select class="custom-select" id="unidade" name="unidade">
                                    <option>Selecione</option>
                                    <option>Litro</option>
                                    <option>Quilo</option>
                                    <option>Tonelada</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <label for="tempoUtilizacao">Prazo de utilização:</label>
                            <div class="input-group">
                                <select class="custom-select" id="tempoUtilizacao" name="tempoUtilizacao">
                                    <option>Selecione</option>
                                    <option>Dia</option>
                                    <option>Semana</option>
                                    <option>Mês</option>
                                    <option>Ano</option>
                                </select>
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
            </form>
    </main>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>