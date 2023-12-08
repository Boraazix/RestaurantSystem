<?php
require_once 'classes/r.class.php';
require_once 'classes/util.class.php';
require_once 'classes/perfilservices.class.php';
if (!Util::logged()) {
    header('Location:login.php');
}
if ($_SESSION['perfil'] != 1) // somente ADM
{
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Sistema do Restaurante</title>
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
            }
        }
        ?>
    </style>
</head>

<body>
    <header>
        <?php include 'templates/header.inc.php' ?>
    </header>

    <main class="container mt-5">
        <h1>Cadastro de Perfis</h1>
        <form action="processos/novoperfil.php" method="post">

            <div id="alert1" style="display: none;"><label style="color: green;">Perfil cadastrado com
                    sucesso.</label><br></div>
            <fieldset>
                <legend>Dados</legend>

                <div class="mb-3">
                    <label for="id" class="form-label">Id: </label>
                    <input type="number" name="id" id="id" value="<?= PerfilServices::buscarNovoId() ?>" disabled style="width: 2rem;" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nome: </label>
                    <input type="text" name="name" id="name" class="form-control"><br>
                </div>

                <button type="submit" class="btn btn-danger">Cadastrar</button><br>
            </fieldset>
        </form>
        <?php

        ?>
    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>

<?php R::close(); ?>