<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/pi_gandara/css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Esqueci a Senha</h1>
                <span>digite seu e-mail</span>
                <input type="email" placeholder="Email">
                <a class="btn btn-success" href="#">Recuperar</a>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Login</h1>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <a class="btn btn-success" href="index.php">Logar</a>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Fazer Login</h1>
                    <p>Entrar usando e-mail e senha</p>
                    <button class="hidden" id="login">Entrar</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Esqueci a Senha</h1>
                    <p>Digite seu e-mail para recuperar a senha</p>
                    <button class="hidden" id="register">Recuperar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>