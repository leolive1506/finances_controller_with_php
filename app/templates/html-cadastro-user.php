<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <title>Página de login</title>
</head>

<body>

    <div id="login">
        <div id="descricao">
            <h1>Cadastro de novo usuário</h1>
            <a href="./login.php" class="transition">Já tem uma conta? Faça seu login</a>
            <?php
                if (!empty($_SESSION['alert'])) {
                    if(!empty($_SESSION['alert']['validar-dados'])) {
                        echo "<p class='alert-danger'>{$_SESSION['alert']['validar-dados']}</p>";
                    }

                    if(!empty($_SESSION['alert']['success'])) {
                        echo "<p class='alert-success'>{$_SESSION['alert']['success']}</p>";
                    }
                }
            ?>
        </div>
        <div id="container-form">
            <form method="POST">
                <div class="input-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome">
                </div>
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="input-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <button class="transition btn-success">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>