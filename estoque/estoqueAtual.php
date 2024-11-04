<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/pi_gandara/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Estoque da Fazenda - Sucos</title>
</head>

<body>

    <header>
        <?php include_once('../utils/menu.php'); ?>
    </header>

    <main>
        <div class="container mt-4">

            <h1 class="text-warning text-center">Estoque da Fazenda - Sucos</h1>

            <!-- Consulta de Produtos -->
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card p-4 mb-4" style="background-color: transparent; border: none;">
                        <h2 class="text-warning text-center"><i class="fas fa-search"></i> Consulta de Produtos</h2>
                        <form action="busca_produto.php" method="get">
                            <div class="form-group">
                                <label for="busca_nome"><i class="fas fa-cube"></i> Nome do Produto</label>
                                <input type="text" id="busca_nome" name="busca_nome" class="form-control" placeholder="Digite o nome do produto" style="border-color: #ff9900;">
                            </div>
                            <div class="form-group">
                                <label for="data_recebimento"><i class="fas fa-calendar-alt"></i> Data de Recebimento</label>
                                <input type="date" id="data_recebimento" name="data_recebimento" class="form-control" style="border-color: #ff9900;">
                            </div>
                            <div class="form-group">
                                <label for="numero_nota"><i class="fas fa-file-alt"></i> Número da Nota</label>
                                <input type="text" id="numero_nota" name="numero_nota" class="form-control" placeholder="Digite o número da nota" style="border-color: #ff9900;">
                            </div>
                            <button type="submit" class="btn btn-warning btn-block" style="background-color: #ff9900; border-color: #cc7a00;">
                                <i class="fas fa-search"></i> Buscar Produto
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Resultados da Consulta -->
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="text-warning text-center"><i class="fas fa-boxes"></i> Resultados da Consulta</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nome do Produto</th>
                                    <th>Quantidade (kg)</th>
                                    <th>Preço</th>
                                    <th>Data de Recebimento</th>
                                    <th>Número da Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Suco de Laranja</td>
                                    <td>100</td>
                                    <td>R$ 5,00</td>
                                    <td>2024-10-01</td>
                                    <td>12345</td>
                                </tr>
                                <tr>
                                    <td>Suco de Limão</td>
                                    <td>75</td>
                                    <td>R$ 4,00</td>
                                    <td>2024-09-28</td>
                                    <td>12346</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-center">Nenhum produto encontrado</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Botão Voltar -->
                    <div class="text-center mt-4">
                        <a href="index.php" class="btn btn-secondary" style="background-color: #ff9900; border-color: #cc7a00; color: white;">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </div>

        </div> <!-- Fim do container -->
    </main>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>
