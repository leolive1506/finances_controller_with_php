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

    <title>Controle finanças</title>
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                    <li>Dashboard</li>
                    <li>Despesas</li>
                    <li>Receitas</li>
                </ul>
            </nav>
            <div id="apresentacao">
                <a href="#">
                    <img class="avatar" src="https://avatars.githubusercontent.com/leolive1506" alt="photo">
                </a>
                <h1>Olá <?= $_SESSION['login']['nome'] ?></h1>
            </div>
        </div>
    </header>
</body>

</html>