<?php
require_once 'classes/util.class.php';
require_once 'classes/perfilservices.class.php';
if(!Util::logged())
{
    header('Location:login.php');
} 
if($_SESSION['perfil']!=1)
{
    header('Location:index.php');
}
if (!empty($_POST['name']))
{
    PerfilServices::salvar($_POST['name']);
    ?>
    <script>alert("O perfil \"<?=$_POST['name']?>\" foi criado com sucesso!");</script>
    <?php
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
        <h1>Cadastro de Perfis</h1>
        <form action="#" method="post">
            <label for="id">Id: </label>
            <input type="number" name="id" id="id" value="<?=PerfilServices::buscarNovoId()?>" disabled><br>
            <label for="name">Nome: </label>
            <input type="text" name="name" id="name"><br>
            <button type="submit">Cadastrar</button>
        </form>
        <?php
            
        ?>
    </main>

    <footer>
        <p>&copy;2023 - Matheus Vieira, Russell Edward & Vitor Gabriel</p>
    </footer>
</body>

</html>