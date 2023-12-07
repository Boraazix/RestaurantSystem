<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .form-container {
            max-width: 350px;
            padding: 1rem;
        }

        html,
        body {
            height: 100%;
        }
    </style>
    <title>Login</title>
    <style>
        <?php
        if (isset($_GET['alert'])) {
            switch ($_GET['alert']) {
                case 1:
                    ?>
                    #alert1 {
                        display: contents !important;
                    }

                    <?php
                    break;
                case 2:
                    ?>
                    #alert2 {
                        display: contents !important;
                    }

                    <?php
                    break;
            }
        }
        ?>
    </style>
</head>

<body class="d-flex align-items-center py-4 bg-body-tentiary">
    <header>
    </header>

    <main class="w-100 m-auto form-container">
        <form action="autenticar.php" method="post">
            <fieldset>
                <h1 class="h3 mb-3 fw-normal">Login</h1>

                <div id="alert1" style="display: none;"><label style="color: red;">Dados de login inválidos!</label><br>
                </div>
                <div id="alert2" style="display: none;"><label style="color: red;">O usuário está desativado do sistema :/</label><br></div>

                <div class="form-floating">
                    <input type="email" name="email" id="email" class="form-control">
                    <label for="floatInput">Email: </label>
                </div>

                <div class="form-floating">
                    <input type="password" name="senha" id="senha" class="form-control">
                    <label for="floatInput">Senha: </label>
                </div>

                <button type="submit" class="btn btn-danger btn-primary w-100 py-2 mt-2">Login</button>
            </fieldset>
        </form>
    

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>