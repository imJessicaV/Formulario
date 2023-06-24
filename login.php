<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;400;700;900&display=swap"
        rel="stylesheet">
    <title>Projeto Formulário</title>
</head>

<body>
    <div class="login">
        <h1>Login</h1>
        <form action="testeLogin.php" method="post" class="form">
            <div class="email">
                <label for="email">
                    <i class="bi bi-person-fill"></i>
                </label>
                <input type="text" name="email" placeholder="E-mail" id="email" required>
            </div>
            <div class="senha">
                <label for="senha">
                    <i class="bi bi-key-fill"></i>
                </label>
                <input type="password" name="senha" placeholder="Senha" id="senha" required>
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Enviar" class="btn">
            </div>
    </div>
</body>

</html>