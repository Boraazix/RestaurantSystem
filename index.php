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
        <?php
        require_once 'classes/usuarioservices.class.php';
        $nome='Simba'; $email='simba@mail'; $senha='123'; $nascimento= new DateTime(); $perfil=1;
        UsuarioServices::salvar($nome, $email, $senha, $nascimento, $perfil);
        ?>
        
    </main>

    <footer>
        <p>&copy;2023 - Matheus Vieira, Russell Edward & Vitor Gabriel</p>
    </footer>
</body>

</html>