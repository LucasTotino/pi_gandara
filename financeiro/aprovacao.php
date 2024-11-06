<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Aprovação de Cotação</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Aprovação de Cotação</h1>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID da Cotação</th>
                    <th>Fornecedor</th>
                    <th>Valor</th>
                    <th>Data de Solicitação</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Fornecedor A</td>
                    <td>R$ 1.000,00</td>
                    <td>05/11/2024</td>
                    <td>Pendente</td>
                    <td>
                        <button class="btn btn-success">Aprovar</button>
                        <button class="btn btn-danger">Rejeitar</button>
                    </td>
                </tr>
                <!-- Adicione mais linhas conforme necessário -->
            </tbody>
        </table>

        <div class="mt-4">
            <h5>Adicionar Comentário</h5>
            <textarea class="form-control" rows="3" placeholder="Digite seu comentário aqui..."></textarea>
            <button class="btn btn-primary mt-2">Enviar Comentário</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>