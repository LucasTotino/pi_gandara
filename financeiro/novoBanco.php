<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/pi_gandara/css/style.css">
    <title>Cadastrar novo Banco</title>
</head>

<body>
    <header>
        <?php
        include_once('../utils/menu.php');
        ?>
    </header>


    <main>
        <form>
            <div class="container">
                <h2>Cadastrar nova conta bancária</h2>
                <hr>

                <!-- Informações do Banco -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomeBanco">Nome do Banco:</label>
                        <input type="text" class="form-control" id="nomeBanco" placeholder="Insira o nome do banco">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="codigoBanco">Código do Banco:</label>
                        <input type="text" class="form-control" id="codigoBanco" placeholder="Insira o código do banco">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="enderecoBanco">Endereço do Banco:</label>
                        <input type="text" class="form-control" id="enderecoBanco" placeholder="Insira o endereço do banco">
                    </div>
                </div>

                <!-- Informações da Conta -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="numeroConta">Número da Conta:</label>
                        <input type="text" class="form-control" id="numeroConta" placeholder="Insira o número da conta">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tipoConta">Tipo de Conta:</label>
                        <select class="form-control" id="tipoConta">
                            <option value="" selected >Selecione o tipo da conta</option>
                            <option value="corrente">Corrente</option>
                            <option value="poupanca">Poupança</option>
                            <option value="salario">Salário</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="moeda">Moeda:</label>
                        <select class="form-control" id="moeda">
                            <option value="">Selecione a moeda</option>
                            <option value="BRL" selected>BRL</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                        </select>
                    </div>
                </div>


<!-- 
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="dataDaTransacao">Data da Transação:</label>
                        <input type="date" class="form-control" id="dataDaTransacao">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tipoDeTransacao">Tipo de Transação:</label>
                        <select class="form-control" id="tipoDeTransacao">
                            <option value="">Selecione o tipo de transação</option>
                            <option value="deposito">Depósito</option>
                            <option value="saque">Saque</option>
                            <option value="transferencia">Transferência</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="valorDaTransacao">Valor da Transação:</label>
                        <input type="number" class="form-control" id="valorDaTransacao" placeholder="Insira o valor da transação">
                    </div>
                </div>



                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomeDeUsuario">Nome de Usuário:</label>
                        <input type="text" class="form-control" id="nomeDeUsuario" placeholder="Insira o nome de usuário">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" id="senha" placeholder="Insira a senha">
                    </div>
                </div>



                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="extratoBancario">Extrato Bancário:</label>
                        <input type="file" class="form-control" id="extratoBancario">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="statusDeReconciliacao">Status de Reconciliação:</label>
                        <select class="form-control" id="statusDeReconciliacao">
                            <option value="">Selecione o status de reconciliação</option>
                            <option value="reconciliado">Reconciliado</option>
                            <option value="nãoReconciliado">Não Reconciliado</option>
                        </select>
                    </div>

                </div> -->

                <div class="form-group col-md-4">
                        <label for="anotacoes">Anotações:</label>
                        <textarea class="form-control" id="anotacoes" placeholder="Insira anotações"></textarea>
                </div>

                    <a type="button" style="text-align: center;" class="col-2 btn btn-success justify-content-center d-flex" href="/pi_gandara/financeiro/gerBancario.php">SALVAR</a>
            </div>
        </form>
    </main>




    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>