
<?php


?>

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

                <a href="../pcp/index.php" class="btn">
                    <div class="col-2">
                        <div style="width: 18rem;">
                            <span class="fa fa-chevron-left fa-2x p-3" aria-hidden=" true"></span>
                        </div>
                    </div>
                </a>
                <div class="col-5">

                </div>
                <div class="col-3 m-3">
                    <a href="../pcp/medicaoProducao.php" class="btn btn-success">Inserir uma nova medição</a>
                </div>
            </div>

            <h2 class="d-flex justify-content-center">Planejamento da Plantação</h2>

            <br>
            <div class="container">
                <h2>Últimas medições:</h2>
                
            </div>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>