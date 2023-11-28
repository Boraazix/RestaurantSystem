<?php
require_once 'classes/util.class.php';
require_once 'classes/noticiaservices.class.php';
if(!Util::logged())
{
    header('Location:login.php');
} 
if($_SESSION['perfil']>2) // ADM e Gerente podem
{
    header('Location:index.php');
}
if(isset($_GET['alert']))
{
    switch($_GET['alert'])
    {
        case 1:
            ?>
            <script>alert("")</script>
            <?php
            break;
    }
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
        <h1>Relatório de Usuários</h1>
        
    </main>

    <footer>
        <a href="index.php">Página Inicial</a>
        <hr>
        <p>&copy;2023 - Matheus Vieira, Russell Edward & Vitor Gabriel</p>
    </footer>
</body>

</html>