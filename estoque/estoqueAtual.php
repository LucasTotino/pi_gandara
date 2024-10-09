<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque da Fazenda - Sucos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fffbe6;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #ff9900;
            margin-bottom: 20px;
        }
        h2 {
            margin-top: 30px;
            color: #ff9900;
        }
        .tabs {
            display: flex;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .tabs div {
            padding: 10px;
            border: 1px solid #ffcc66;
            margin-right: 5px;
            background-color: #fff;
        }
        .tabs div.active {
            background-color: #f1f1f1;
            border-bottom: none;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        form {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ffcc66;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #ff9900;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #cc7a00;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ffcc66;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #ffcc66;
            color: #333;
        }
        .back-button {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #ff9900;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #cc7a00;
        }
    </style>
</head>
<body>
    <h1>Estoque da Fazenda - Sucos</h1>

    <div class="tabs">
        <div class="tab-link active" data-tab="consulta">Consulta de Produtos</div>
    </div>

    <div id="consulta" class="tab-content active">
        <h2>Consulta de Produtos</h2>
        <form action="busca_produto.php" method="get">
            <label for="busca_nome">Nome do Produto:</label>
            <input type="text" id="busca_nome" name="busca_nome" placeholder="Digite o nome do produto">

            <label for="data_recebimento">Data de Recebimento:</label>
            <input type="date" id="data_recebimento" name="data_recebimento">

            <label for="numero_nota">Número da Nota:</label>
            <input type="text" id="numero_nota" name="numero_nota" placeholder="Digite o número da nota">

            <input type="submit" value="Buscar Produto">
        </form>

        <h2>Resultados da Consulta</h2>
        <table>
            <tr>
                <th>Nome do Produto</th>
                <th>Quantidade (kg)</th>
                <th>Preço</th>
                <th>Data de Recebimento</th>
                <th>Número da Nota</th>
            </tr>
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
            <!-- Adicione mais produtos conforme necessário -->
            <tr>
                <td colspan="5" style="text-align: center;">Nenhum produto encontrado</td>
            </tr>
        </table>
    </div>

    <button class="back-button" onclick="window.location.href='index.php'">Voltar para Página Inicial</button>

    <script>
        document.querySelectorAll('.tab-link').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

                tab.classList.add('active');
                document.getElementById(tab.getAttribute('data-tab')).classList.add('active');
            });
        });
    </script>
</body>
</html>
