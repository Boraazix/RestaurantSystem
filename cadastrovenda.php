<?php
require_once 'classes/util.class.php';
require_once 'classes/noticiaservices.class.php';
if (!Util::logged()) {
    header('Location:login.php');
}
if ($_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 1) // somente caixa e ADM
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
        <h1>Cadastro de Vendas</h1>

        <?php
        if (isset($_GET['alert'])) {
            switch ($_GET['alert']) {
                case 1:
                    ?>
                    <div class="alert alert-success mt-3" role="alert">
                        Venda cadastrada com sucesso.
                    </div>
                    <?php
                    break;
                case 2:
                    ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        Para realizar uma compra, é necessário escolher um produto.
                    </div>
                    <?php
                    break;
            }
        }
        ?>

        <form action="efetuarvenda.php" method="post" class="mt-4">
            <fieldset>
                <legend>Cliente da Venda</legend>

                <div class="mb-3">
                    <label for="cliente" class="form-label">Selecione o cliente:</label>
                    <select name="cliente" id="cliente" class="form-select">
                        <?php
                        require_once 'classes/usuarioservices.class.php';

                        $usuarios = UsuarioServices::buscarTodos();

                        foreach ($usuarios as $usuario) {
                            echo "<option value=\"$usuario->id\">$usuario->id | $usuario->nome</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-danger">Iniciar Venda</button>
            </fieldset>
        </form>

    </main>

    <footer class="bg-light text-center mt-5 py-3">
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>