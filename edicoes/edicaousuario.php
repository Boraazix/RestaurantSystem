<?php
require_once '../classes/util.class.php';
require_once '../classes/usuarioservices.class.php';
require_once '../classes/perfilservices.class.php';
if (!Util::logged()) {
    header('Location:../login.php');
}
if ($_SESSION['perfil'] > 2) // ADM e Gerente podem
{
    header('Location:../index.php');
}
if (!isset($_GET['id'])) 
{
    header('Location:../cadastrousuario.php');
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
        <?php include '../templates/header.inc.php' ?>
    </header>

    <main>
        <h1>Editar Usuário</h1>
        <form action="../processos/editarusuario.php" method="post">
            <fieldset>
                <legend>Dados</legend>
                <?php
                $usuario = UsuarioServices::buscarPorId($_GET['id']);
                ?>
                <label for="idi">Id: </label>
                <input type="number" name="idi" id="idi" value="<?= $usuario->id?>" disabled style="width: 2rem;"><br>
                <input type="hidden" name="id" value="<?= $usuario->id?>">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" value="<?= $usuario->nome?>" required><br>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="<?= $usuario->email?>" required><br>
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha" required><br>
                <label for="nascimento">Nascimento: </label>
                <input type="date" name="nascimento" id="nascimento" value="<?= $usuario->nascimento?>" required><br>
                <label for="perfil">Perfil: </label>
                <select name="perfil" id="perfil"  required>
                    <?php

                    $perfis = PerfilServices::buscarTodos();
                    if ($_SESSION['perfil'] == 2) {
                        foreach ($perfis as $perfil) {
                            if ($perfil->id > 3)
                                echo "<option value=\"$perfil->id\" ".($usuario->perfil==$perfil->id?'selected':'').">$perfil->nome</option>";
                        }
                    } else {
                        foreach ($perfis as $perfil) {
                            echo "<option value=\"$perfil->id\" ".($usuario->perfil==$perfil->id?'selected':'').">$perfil->nome</option>";
                        }
                    }
                    ?>
                </select><br>
                <input type="checkbox" name="carteira" id="carteira" value="1" <?=($usuario->carteira?'checked':'')?>><label for="carteira">Carteira</label><br>
                <input type="checkbox" name="ativo" id="ativo" value="1" <?=($usuario->ativo?'checked':'')?>><label for="ativo">Ativo</label><br>
                <label for="pin">Pin: </label><input type="number" name="pin" id="pin" style="width: 3.5rem;" required><br>
                <button type="submit">Salvar alterações</button>
            </fieldset>
        </form>
    </main>

    <footer>
        <a href="index.php">Página Inicial</a>
        <hr>
        <p>&copy;2023 - Matheus Vieira, Russell Edward & Vitor Gabriel</p>
    </footer>
</body>

</html>