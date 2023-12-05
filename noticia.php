<?php
if (!isset($_GET['id'])) {
    header('Location:noticias.php');
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
        <h1>Notícias do Restaurante</h1>
        <div>
            <?php
            require_once 'classes/noticiaservices.class.php';
            require_once 'classes/usuarioservices.class.php';

            $noticia = NoticiaServices::buscarPorId($_GET['id']);


            $str = "<h2>$noticia->titulo</h2>";
            $str .= "$noticia->conteudo";
            $autor = UsuarioServices::buscarPorId($noticia->autor);
            $str .= "<hr><i>Postado por $autor->nome em $noticia->data</i>";

            echo $str;
            ?>
        </div>
    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>