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
        <h4>Inserir um kanban, que quando checado identifica e passa pra próxima etapa, e marca a etapa anterior como feito</h4>
        <h4>realizar o acompanhamento do crescimento da planta (de x em x tempos, realiza o acompanhamento do crecsimento da árvore e do fruto) colocar barra com acompanhamento do crescimneto, sendo 100% a colheita</h4>
    </div>

    <div class="container">
        <a href="/pi_gandara/pcp/planPlantacao.php" class="btn">
            <div class="col-6 p-5 m-1">
                <div style="width: 18rem;">
                    <span class="fa fa-book fa-5x" aria-hidden="true"></span>
                    <div class="card-body">
                        <h3>Planejamento de Plantação</h3>
                    </div>
                </div>
            </div>
        </a>

        <a href="/pi_gandara/pcp/acompProducao.php" class="btn">
            <div class="col-6 p-5 m-1">
                <div style="width: 18rem;">
                    <span class="fa fa-inbox fa-5x" aria-hidden="true"></span>
                    <div class="card-body">
                        <h3>Acompanhamento da Produção</h3>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>