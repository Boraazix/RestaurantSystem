<?php
require_once '../classes/util.class.php';
require_once '../classes/produtoservices.class.php';
require_once '../classes/itemservices.class.php';
require_once '../classes/vendaservices.class.php';
require_once '../classes/usuarioservices.class.php';

echo md5('1234' . 'antagonista');

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

    <main>
        <h1>PIN</h1>

        <div id="alert1" style="display: none;"><label style="color: red;">PIN incorreto!</label><br></div>
        <form action="#" method="post">
            <fieldset>
                <legend>Peça para o cliente digitar o PIN de 4 dígitos</legend>

                <?php
                $cliente = UsuarioServices::buscarPorId($_POST['cliente']);
                ?>
                <label for="pin">Pin: </label><input type="number" style="width: 3.5rem;" required name="pin" id="pin" min="1000" max="9999">

                <input type="submit" value="Concluir Compra">

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

    <footer>
        <br><a href="../index.php">Página Inicial</a>
        <hr>
        <p>&copy;2023 - Matheus Vieira, Russell Edward & Vitor Gabriel</p>
    </footer>
</body>

</html>
<?php R::close(); ?>