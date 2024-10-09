<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque de Insumos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fffbe6;
            color: #333;
        }
        h1 {
            color: #ff9900;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        table, th, td {
            border: 1px solid #ffcc66;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ffcc66;
            color: #333;
        }
        .search-bar {
            margin-bottom: 20px;
        }
        .search-bar input[type="text"] {
            padding: 8px;
            border: 1px solid #ffcc66;
            border-radius: 4px;
        }
        .search-bar button {
            padding: 8px 16px;
            background-color: #ff9900;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-bar button:hover {
            background-color: #cc7a00;
        }
        .back-button {
            margin-top: 20px;
        }
        .back-button button {
            padding: 10px 20px;
            background-color: #ff9900;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .back-button button:hover {
            background-color: #cc7a00;
        }
    </style>
</head>
<body>
    <h1>Estoque de Insumos</h1>
    <div class="search-bar">
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Pesquisar insumos...">
            <button type="submit">Pesquisar</button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nome do Insumo</th>
                <th>Quantidade</th>
                <th>Unidade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Adubo Orgânico</td>
                <td>50</td>
                <td>kg</td>
            </tr>
            <tr>
                <td>Sementes de Milho</td>
                <td>200</td>
                <td>unidades</td>
            </tr>
            <tr>
                <td>Herbicida</td>
                <td>30</td>
                <td>litros</td>
            </tr>
            <tr>
                <td>Fertilizante</td>
                <td>100</td>
                <td>kg</td>
            </tr>
        </tbody>
    </table>
    <div class="back-button">
        <form action="index.php">
            <button type="submit">Voltar para a Página Inicial</button>
        </form>
    </div>
</body>
</html>
