<?php
require_once 'classes/util.class.php';
require_once 'classes/usuarioservices.class.php';
require_once 'classes/perfilservices.class.php';
if (!Util::logged()) {
    header('Location:login.php');
}
if ($_SESSION['perfil'] > 2) // ADM e Gerente podem
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
        <?php include 'templates/header.inc.php' ?>
    </header>

    <main>
        <h1>Cadastro de Usuários</h1>
        <form action="processos/novousuario.php" method="post">

            <div id="alert1" style="display: none;"><label style="color: green;">Usuário cadastrado com sucesso.</label><br></div>
            <div id="alert2" style="display: none;"><label style="color: green;">Alterações realizadas com sucesso.</label><br></div>
            
            <fieldset>
                <legend>Dados</legend>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" required><br>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" required><br>
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha" required><br>
                <label for="nascimento">Nascimento: </label>
                <input type="date" name="nascimento" id="nascimento" required><br>
                <label for="perfil">Perfil: </label>
                <select name="perfil" id="perfil" required>
                    <?php

                    $perfis = PerfilServices::buscarTodos();
                    if ($_SESSION['perfil'] == 2) {
                        foreach ($perfis as $perfil) {
                            if ($perfil->id > 3)
                                echo "<option value=\"$perfil->id\">$perfil->nome</option>";
                        }
                    } else {
                        foreach ($perfis as $perfil) {
                            echo "<option value=\"$perfil->id\">$perfil->nome</option>";
                        }
                    }
                    ?>
                </select><br>
                <input type="checkbox" name="carteira" id="carteira" value="1"><label for="carteira">Carteira</label><br>
                <input type="checkbox" name="ativo" id="ativo" value="1"><label for="ativo">Ativo</label><br>
                <label for="pin">Pin: </label><input type="number" style="width: 3.5rem;" required><br>
                <button type="submit">Cadastrar</button>
            </fieldset>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Nascimento</th>
                    <th>Perfil</th>
                    <th>Carteira</th>
                    <th>Ativo</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarios = UsuarioServices::buscarTodos();
                foreach ($usuarios as $usuario) {
                    $str = "<tr>";

                    $str .= "<td>$usuario->id</td>";
                    $str .= "<td>$usuario->nome</td>";
                    $str .= "<td>$usuario->email</td>";
                    $str .= "<td>" . date('d/m/Y', strtotime($usuario->nascimento)) . "</td>";
                    $str .= "<td>" . PerfilServices::buscarPorId($usuario->perfil)->nome . "</td>";
                    $str .= "<td " . ($usuario->carteira ? 'style="color:green">Sim' : 'style="color:red">Não') . "</td>";
                    $str .= "<td " . ($usuario->ativo ? 'style="color:green">Sim' : 'style="color:red">Não') . "</td>";
                    $str .= "<td><a href=\"edicoes/edicaousuario.php?id=$usuario->id\">Editar</a></td>";

                    echo $str . "</tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>