<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        <?php
        if(isset($_GET['alert'])) {
            switch($_GET['alert']) {
                case 1:
                    ?>
                    #alert1 {display: contents !important;}
                    <?php
                    break;
                case 2:
                    ?>
                    #alert2 {display: contents !important;}
                    <?php
                    break;
            }
        }
        ?>
    </style>
</head>

<body>
    <header>
    </header>

    <main>
        <form action="autenticar.php" method="post">
            <fieldset>
                <legend>Dados</legend>

                <div id="alert1" style="display: none;"><label style="color: red;">Dados de login inválidos!</label><br></div>
                <div id="alert2" style="display: none;"><label style="color: red;">O usuário está desativado do sistema :/</label><br></div>

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