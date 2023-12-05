<?php
require_once 'classes/util.class.php';
if(!Util::logged()) {
    header('Location:login.php');
}
if($_SESSION['perfil'] > 2) // ADM e Gerente podem
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
        <h1>Cadastro de Produtos</h1>

        <form action="processos/novoproduto.php" method="post">
            <div id="alert1" style="display: none;"><label style="color: green;">Produto cadastrado com sucesso.</label><br></div>
            <fieldset>
                <legend>Dados</legend>


                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" required><br>
                <label for="descricao">Descrição: </label><br>
                <textarea name="descricao" id="descricao" cols="45" rows="10" style="resize: none;" placeholder="Descreva as características de seu produto aqui" required></textarea><br>
                <label for="preco">Preço: </label>
                <input type="number" name="preco" id="preco" step="0.01" min="0" placeholder="0.00" required>

                <button type="submit">Cadastrar</button>
            </fieldset>
        </form>

    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>