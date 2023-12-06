<?php
require_once 'classes/util.class.php';
require_once 'classes/noticiaservices.class.php';
if(!Util::logged()) {
    header('Location:login.php');
}
if($_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 1) // somente caixa e ADM
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

    <main>
        <h1>Cadastro de Vendas</h1>

        <div id="alert1" style="display: none;"><label style="color: green;">Venda cadastrada com sucesso.</label><br></div>
        <div id="alert2" style="display: none;"><label style="color: red;">Para realizar uma compra, é necessário escolher um produto</label><br></div>

        <form action="efetuarvenda.php" method="post">
            <fieldset>
                <legend>Cliente da Venda</legend>

                <select name="cliente" id="cliente" style="width: fit-content;">
                    <?php
                    require_once 'classes/usuarioservices.class.php';

                    $usuarios = UsuarioServices::buscarTodos();

                    foreach($usuarios as $usuario) {
                        echo "<option value=\"$usuario->id\">$usuario->id | $usuario->nome</option>";
                    }
                    ?>
                </select>
                <br>
                <button>Iniciar Venda</button>
            </fieldset>
        </form>

    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>