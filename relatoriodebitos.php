<?php
require_once 'classes/util.class.php';
require_once 'classes/noticiaservices.class.php';
if(!Util::logged())
{
    header('Location:login.php');
} 
if($_SESSION['perfil']!=3 && $_SESSION['perfil']!=1) // somente caixa e ADM
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
</head>

<body>
    <header>
        <?php include 'templates/header.inc.php' ?>
    </header>

    <main>
        <h1>Relatório de Débitos</h1>
        
    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>