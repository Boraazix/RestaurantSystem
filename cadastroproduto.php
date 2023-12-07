<?php
require_once 'classes/util.class.php';
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
        <h1>Cadastro de Produtos</h1>

        <form action="processos/novoproduto.php" method="post">
            <div id="alert1" style="display: none;"><label style="color: green;">Produto cadastrado com
                    sucesso.</label><br></div>
            <fieldset>
                <legend>Dados</legend>

                <div class="form-floating">
                    <input type="text" name="nome" id="nome" required class="form-control"><br>
                    <label for="floatingInput">Nome do Produto:</label>
                </div>

                <div class="form-floating">
                    <textarea name="descricao" id="descricao" cols="45" rows="10" style="resize: none;" placeholder="Descreva as características de seu produto aqui" required class="form-control"></textarea><br>
                    <label for="floatingInput">Descrição: </label>
                </div>

                <div class="form-floating">
                    <input type="number" name="preco" id="preco" step="0.01" min="0" placeholder="0.00" required class="form-control">
                    <label for="floatingInput">Preço: </label><br>
                </div>

                <button type="submit" class="btn btn-danger">Cadastrar</button>
            </fieldset>
        </form>

    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>