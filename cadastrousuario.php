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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <style>
        main {
            height: 100%;
        }
    </style>
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

<body>
    <header>
        <?php include 'templates/header.inc.php' ?>
    </header>

    <main class="container mt-5">
        <h1>Cadastro de Usuários</h1>
        <form action="processos/novousuario.php" method="post">

            <div id="alert1" style="display: none;"><label style="color: green;">Usuário cadastrado com
                    sucesso.</label><br></div>
            <div id="alert2" style="display: none;"><label style="color: green;">Alterações realizadas com
                    sucesso.</label><br></div>

            <fieldset>
                <legend>Dados</legend>

                <div class="form-floating">
                    <input type="text" name="nome" id="nome" required class="form-control">
                    <label for="floatingInput">Nome:</label><br>
                </div>

                <div class="form-floating">
                    <input type="email" name="email" id="email" required class="form-control">
                    <label for="floatingInput">Email:</label><br>
                </div>

                <div class="form-floating">
                    <input type="password" name="senha" id="senha" required class="form-control">
                    <label for="floatingInput">Senha:</label><br>
                </div>

                <div class="form-floating">
                    <input type="date" name="nascimento" id="nascimento" required class="form-control">
                    <label for="floatingInput">Nascimento:</label><br>
                </div>

                <div class="form-floating">
                    <select name="perfil" id="perfil" required class="form-select">
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
                    </select>
                    <label for="perfil">Perfil:</label><br>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="carteira" id="carteira" value="1" class="form-check-input">
                    <label for="carteira" class="form-check-label">Carteira</label><br>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="ativo" id="ativo" value="1" class="form-check-input" checked>
                    <label for="ativo" class="form-check-label">Ativo</label><br>
                </div>

                <div class="mb-3">
                    <label for="pin" class="form-label">Pin: </label>
                    <input type="number" style="width: 5rem;" required class="form-control" name="pin"><br>
                </div>

                <button type="submit" class="btn btn-danger">Cadastrar</button>
            </fieldset>
        </form>

        <h2>Lista de Usuários</h2>

        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $usuarios = UsuarioServices::buscarTodos();
                    foreach ($usuarios as $usuario) {
                        $str = "<tr>";

                        $str .= "<td>$usuario->nome</td>";
                        $str .= "<td>$usuario->email</td>";
                        $str .= "<td>" . PerfilServices::buscarPorId($usuario->perfil)->nome . "</td>";
                        $str .= "<td>".($usuario->id==1?"":"<a href=\"edicoes/edicaousuario.php?id=$usuario->id\">Editar</a>")."</td>";

                        echo $str . "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>