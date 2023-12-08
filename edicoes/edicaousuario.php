<?php
require_once '../classes/r.class.php';
require_once '../classes/util.class.php';
require_once '../classes/usuarioservices.class.php';
require_once '../classes/perfilservices.class.php';
if(!Util::logged()) {
    header('Location:../login.php');
}
if($_SESSION['perfil'] > 2) // ADM e Gerente podem
{
    header('Location:../index.php');
}
if(!isset($_GET['id'])) {
    header('Location:../cadastrousuario.php');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            padding-top: 60px;
            padding-bottom: 40px;
            position: relative;
            min-height: 100;
            margin-bottom: 100px;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: #f5f5f5;
            padding: 10px 0;
        }
        
    </style>
    <title>Sistema do Restaurante</title>
</head>

<body>
    <header>
        <?php include '../templates/header.inc.php' ?>
    </header>

    <main class="container">
        <h1 class="mt-4">Editar Usuário</h1>
        <form action="../processos/editarusuario.php" method="post">
            <fieldset>
                <legend>Dados</legend>
                <?php
                $usuario = UsuarioServices::buscarPorId($_GET['id']);
                ?>
                <div class="mb-3">
                    <label for="idi" class="form-label">Id:</label>
                    <input type="number" name="idi" id="idi" value="<?= $usuario->id ?>" class="form-control" disabled style="width: 2rem;">
                    <input type="hidden" name="id" value="<?= $usuario->id ?>">
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?= $usuario->nome ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" value="<?= $usuario->email ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" name="senha" id="senha" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nascimento" class="form-label">Nascimento:</label>
                    <input type="date" name="nascimento" id="nascimento" value="<?= $usuario->nascimento ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="perfil" class="form-label">Perfil:</label>
                    <select name="perfil" id="perfil" class="form-select " required>
                        <?php
                        $perfis = PerfilServices::buscarTodos();
                        if($_SESSION['perfil'] == 2) {
                            foreach($perfis as $perfil) {
                                if($perfil->id > 3)
                                    echo "<option value=\"$perfil->id\" ".($usuario->perfil == $perfil->id ? 'selected' : '').">$perfil->nome</option>";
                            }
                        } else {
                            foreach($perfis as $perfil) {
                                echo "<option value=\"$perfil->id\" ".($usuario->perfil == $perfil->id ? 'selected' : '').">$perfil->nome</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" name="carteira" id="carteira" value="1" class="form-check-input"
                        <?= ($usuario->carteira ? 'checked' : '') ?>>
                    <label for="carteira" class="form-check-label">Carteira</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" name="ativo" id="ativo" value="1" class="form-check-input"
                        <?= ($usuario->ativo ? 'checked' : '') ?>>
                    <label for="ativo" class="form-check-label">Ativo</label>
                </div>
                <div class="mb-3">
                    <label for="pin" class="form-label">Pin:</label>
                    <input type="number" name="pin" id="pin" class="form-control" style="width: 4.7rem;" required
                        min="1000" max="9999">
                </div>
                <button type="submit" class="btn btn-danger">Salvar alterações</button>
            </fieldset>
        </form>
    </main>

    <footer>
        <br><a href="../index.php" class="btn btn-danger">Página Inicial</a>
        <hr>
        <p>&copy;2023 - Matheus Vieira, Russell Edward & Vitor Gabriel</p>
    </footer>
</body>

</html>
<?php R::close(); ?>