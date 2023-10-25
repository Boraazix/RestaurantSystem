<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <header>
        <h2>DevWeb2023</h2>
    </header>

    <main>
        <form action="autenticar.php" method="post">
            <fieldset>
                <legend>Dados</legend>

                <label for="email">Email: </label>
                <input type="email" name="email" id="email">
                <br>

                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha">
                <br>

                <button type="submit">Login</button>
            </fieldset>
        </form>
    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>