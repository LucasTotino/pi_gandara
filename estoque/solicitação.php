<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitação de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fffbe6;
            color: #333;
        }
        h1 {
            color: #ff9900;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ffcc66;
            border-radius: 4px;
        }
        .item-list {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        button {
            padding: 10px 20px;
            background-color: #ff9900;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #cc7a00;
        }
    </style>
</head>
<body>
    <h1>Solicitação de Produtos em Falta</h1>
    <div class="container">
        <form id="solicitacao-form" method="post" action="">
            <label for="nome_produto">Nome do Produto:</label>
            <input type="text" id="nome_produto" name="nome_produto" required>

            <label for="quantidade">Quantidade Necessária:</label>
            <input type="number" id="quantidade" name="quantidade" min="1" required>

            <label for="tipo_produto">Tipo de Produto:</label>
            <select id="tipo_produto" name="tipo_produto" required>
                <option value="" disabled selected>Selecione o tipo de produto</option>
                <option value="insumos">Insumos</option>
                <option value="material_consumo">Material de Consumo</option>
                <option value="produto_acabado">Produto Acabado</option>
                <option value="produto_semiacabado">Produto Semiacabado</option>
            </select>

            <button type="button" onclick="adicionarProduto()">Adicionar Produto</button>
        </form>

        <div class="item-list" id="item-list">
            <h2>Produtos Solicitados</h2>
            <table id="produtos-table">
                <thead>
                    <tr>
                        <th>Nome do Produto</th>
                        <th>Quantidade</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Os itens serão adicionados aqui -->
                </tbody>
            </table>
        </div>

        <button type="button" onclick="enviarSolicitacao()">Enviar Solicitação</button>
    </div>

    <script>
        let produtos = [];

        function adicionarProduto() {
            const nomeProduto = document.getElementById('nome_produto').value;
            const quantidade = document.getElementById('quantidade').value;
            const tipoProduto = document.getElementById('tipo_produto').value;

            if (nomeProduto && quantidade && tipoProduto) {
                produtos.push({ nome: nomeProduto, quantidade: quantidade, tipo: tipoProduto });
                atualizarLista();
                document.getElementById('solicitacao-form').reset();
            } else {
                alert('Por favor, preencha todos os campos.');
            }
        }

        function removerProduto(index) {
            produtos.splice(index, 1);
            atualizarLista();
        }

        function atualizarLista() {
            const tbody = document.getElementById('produtos-table').querySelector('tbody');
            tbody.innerHTML = '';

            produtos.forEach((produto, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${produto.nome}</td>
                    <td>${produto.quantidade}</td>
                    <td>${produto.tipo}</td>
                    <td><button type="button" onclick="removerProduto(${index})">Remover</button></td>
                `;
                tbody.appendChild(row);
            });
        }

        function enviarSolicitacao() {
            if (produtos.length === 0) {
                alert('Adicione pelo menos um produto à lista.');
                return;
            }

            // Aqui você pode adicionar a lógica para enviar a solicitação ao servidor
            console.log('Produtos solicitados:', produtos);
            alert('Solicitação enviada com sucesso!');
        }
    </script>
</body>
</html>
