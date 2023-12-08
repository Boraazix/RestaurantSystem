<?php
require_once '../classes/r.class.php';
require_once '../classes/util.class.php';
require_once '../classes/produtoservices.class.php';
require_once '../classes/itemservices.class.php';
require_once '../classes/vendaservices.class.php';
require_once '../classes/usuarioservices.class.php';

if(!Util::logged()) {
    header('Location:login.php');
}
if(empty($_POST['cliente'])) {
    header('Location:../cadastrovenda.php');
}
if(!empty($_POST['avista'])) // se for a vista
{
    if(empty($_POST['pin']) || Util::validarPin($_POST['cliente'], $_POST['pin'])) {
        if(!empty($_POST['carrinho'])) {
            date_default_timezone_set('America/Fortaleza');
            $venda = VendaServices::salvar($_POST['cliente'], $_SESSION['id'], new DateTime(), (empty($_POST['pin']) ? new DateTime() : null));
            
            $quantidade = $_POST['quantidade'];
            $carrinho = $_POST['carrinho'];
            foreach($carrinho as $key => $value) 
            {
                ItemServices::salvar($venda, $value, $quantidade[$value]);
            }

            header('Location:../cadastrovenda.php?alert=1');
        } else {
            header('Location:../cadastrovenda.php?alert=2');
        }
    }
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
        if(!Util::validarPin($_POST['cliente'], $_POST['pin'])) {
            ?>
            #alert1 {
                display: contents !important;
            }
            <?php
        }
        ?>
    </style>
</head>
<body>
    <header>
    </header>

    <main class="container mt-5">
        <h1>PIN</h1>

        <div id="alert1" style="display: none;"><label style="color: red;">PIN incorreto!</label><br></div>
        <form action="#" method="post">
            <fieldset>
                <legend>Peça para o cliente digitar o PIN de 4 dígitos</legend>

                <?php
                $cliente = UsuarioServices::buscarPorId($_POST['cliente']);
                ?>
                <div class="mb-3">
                    <br><label for="pin" class="form-label">Pin: </label>
                    <input type="number" style="width: 5rem;" required class="form-control" name="pin">
                </div>

                <input type="submit" class="btn btn-danger" value="Concluir Compra">

                <input type="hidden" name="cliente" value="<?= $_POST['cliente'] ?>">
                <input type="hidden" name="avista" value="on">
                <?php
                $quantidade = $_POST['quantidade'];
                $carrinho = $_POST['carrinho'];
                foreach($quantidade as $key => $value) {
                    echo "<input type=\"hidden\" name=\"quantidade[$key]\" value=\"$value\">";
                }
                foreach($carrinho as $key => $value) {
                    echo "<input type=\"hidden\" name=\"carrinho[$key]\" value=\"$value\">";
                }
                ?>

            </fieldset>
        </form>

    </main>

    <footer class="bg-light text-center mt-5 py-3">
        <br><a href="../index.php">Página Inicial</a>
        <hr>
        <p>&copy;2023 - Matheus Vieira, Russell Edward & Vitor Gabriel</p>
    </footer>
</body>

</html>
<?php R::close(); ?>