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
        }
        h1 {
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
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        input[type="date"],
        select {
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
        <div class="tab-link active" data-tab="cadastro">Cadastro de Produtos</div>
        <div class="tab-link" data-tab="consulta">Consulta de Produtos</div>
    </div>

    <div id="cadastro" class="tab-content active">
        <h2>Cadastro de Produtos</h2>
        <form action="processa_cadastro.php" method="post">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" required>

            <label for="quantidade">Quantidade (kg):</label>
            <input type="number" id="quantidade" name="quantidade" required>

            <label for="data_recebimento">Data de Recebimento:</label>
            <input type="date" id="data_recebimento" name="data_recebimento" required>

            <label for="numero_nota">Número da Nota:</label>
            <input type="text" id="numero_nota" name="numero_nota" required>

            <label for="bardbox">Tipo de Produto:</label>
            <select id="bardbox" name="tipo_produto">
                <option value="material_consumo">Material de Consumo</option>
                <option value="produto_acabado">Produto Acabado</option>
                <option value="produto_semi_acabado">Produto Semi-Acabado</option>
            </select>

            <input type="submit" value="Cadastrar Produto">
        </form>
    </div>

    <div id="consulta" class="tab-content">
        <h2>Consulta de Produtos</h2>
        <form action="busca_produto.php" method="get">
            <label for="busca_nome">Nome do Produto:</label>
            <input type="text" id="busca_nome" name="busca_nome">

            <label for="busca_tipo_produto">Tipo de Produto:</label>
            <select id="busca_tipo_produto" name="busca_tipo_produto">
                <option value="">Selecione</option>
                <option value="material_consumo">Material de Consumo</option>
                <option value="produto_acabado">Produto Acabado</option>
                <option value="produto_semi_acabado">Produto Semi-Acabado</option>
            </select>

            <label for="busca_preco">Preço:</label>
            <input type="number" id="busca_preco" name="busca_preco" step="0.01">

            <label for="busca_quantidade">Quantidade (kg):</label>
            <input type="number" id="busca_quantidade" name="busca_quantidade">

            <label for="busca_data_recebimento">Data de Recebimento:</label>
            <input type="date" id="busca_data_recebimento" name="busca_data_recebimento">

            <input type="submit" value="Buscar Produto">
        </form>
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
