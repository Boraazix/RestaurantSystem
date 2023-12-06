<?php
require_once 'classes/usuarioservices.class.php';
require_once 'classes/produtoservices.class.php';

$carrinho = [];

if(!isset($_POST['cliente'])){
    header('index.php');
}

if(isset($_POST['adicionar'])){
    $venda = R::dispense('item');
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
        <h1>Cadastro de Vendas</h1>
        
        <form method="post">
            <fieldset>
                <legend>Dados da Venda</legend>

                <?php
                $cliente = UsuarioServices::buscarPorId($_POST['cliente']);
                $produtos = ProdutoServices::buscarTodos();
                ?>

                <p>Venda <?= (isset($_POST['prazo']) ? 'a prazo' : 'à vista') ?> para <?= $cliente->nome ?> por <?= $_SESSION['nome'] ?></p>

                <p>Produto:</p>
                <select name="produto" id="produto">
                    <?php
                    foreach($produtos as $produto){
                        echo "<option value=\"$produto->id\">$produto->nome | R$$produto->preco</option>";
                    }
                    ?>
                </select>

                <label for="quantidade">Quantidade: </label>
                <input type="number" name="quantidade" id="quantidade">
                <input type="submit" value="Adicionar" name="adicionar">

                <?php
                if(isset($_POST['adicionar'])){
                    echo "<input type=\"hidden\" name=\"carrinho[]\" value=\"$produto\">";
                }
                ?>

                <p>Carrinho:</p>

                <input type="submit" value="Concluir Compra" name="concluir">
            </fieldset>
        </form>

    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>