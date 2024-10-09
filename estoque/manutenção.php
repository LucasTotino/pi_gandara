<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Peças de Manutenção</title>
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
        form {
            background-color: #fff;
            padding: 15px;
            border: 1px solid #ffcc66;
            border-radius: 4px;
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ffcc66;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #ff9900;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #cc7a00;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin-top: 20px;
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
        .no-data {
            text-align: center;
            font-style: italic;
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
    <h1>Controle de Peças de Manutenção</h1>

    <h2>Adicionar Peça</h2>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required>
        
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>
        
        <button type="submit" name="add">Adicionar</button>
    </form>

    <h2>Peças no Estoque</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Descrição</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Peça A</td>
            <td>10</td>
            <td>Descrição da peça A</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Peça B</td>
            <td>5</td>
            <td>Descrição da peça B</td>
        </tr>
        <!-- Adicione mais peças conforme necessário -->
        <tr>
            <td colspan="4" class="no-data">Nenhuma peça encontrada</td>
        </tr>
    </table>

    <a class="back-button" href="index.php">Voltar para Página Inicial</a>
</body>
</html>
