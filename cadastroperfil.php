<?php
require_once 'classes/util.class.php';
require_once 'classes/perfilservices.class.php';
if(!Util::logged()) {
    header('Location:login.php');
}
if($_SESSION['perfil'] != 1) // somente ADM
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
    <title>Sistema do Restaurante</title>
    <style>
        <?php
        if(isset($_GET['alert'])) {
            switch($_GET['alert']) {
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

    <main>
        <h1>Cadastro de Perfis</h1>
        <form action="processos/novoperfil.php" method="post">

            <div id="alert1" style="display: none;"><label style="color: green;">Perfil cadastrado com
                    sucesso.</label><br></div>
            <fieldset>
                <legend>Dados</legend>
                
                <label for="id">Id: </label>
                <input type="number" name="id" id="id" value="<?= PerfilServices::buscarNovoId() ?>" disabled
                    style="width: 2rem;"><br>
                <label for="name">Nome: </label>
                <input type="text" name="name" id="name"><br>
                <button type="submit">Cadastrar</button>
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