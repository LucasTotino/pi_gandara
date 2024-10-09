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

    <div class="container mt-5">
        <form action="" method="POST"><!-- Inicio Formulário -->
            <div class="row">
                <div class="col-8">
                    <h2>Acompanhamento da Produção:</h2>
                </div>
                <div class="col-4">
                    <a href="../pcp/medicaoProducao.php" class="btn btn-success">Inserir uma nova medição</a>
                </div>
            </div>

            <br>
            <div class="container">
                <H2> Aqui ficará as medições que serão puxadas do banco, juntamente com a previsão da produção utilizando os parâmetros que possuímos </H2>
            </div>
    </div>
    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>