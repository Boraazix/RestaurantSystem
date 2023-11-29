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

        <?php
            require_once 'classes/noticiaservices.class.php';
            require_once 'classes/usuarioservices.class.php';

            $noticias = NoticiaServices::buscarTres();

            foreach($noticias as $noticia) {
                $str = "<div>";
                $str .= "<h3>$noticia->titulo</h3>";
                $str .= "$noticia->conteudo";
                $autor = UsuarioServices::buscarPorId($noticia->autor);
                $str .= "Postado por $autor->nome em $noticia->data";

                echo $str . "</div>";
            }
        ?>

        <a href="noticias.php">Veja mais notícias</a>
    </main>

    <footer>
        <p>&copy;2023 - Matheus Vieira, Russell Edward & Vitor Gabriel</p>
    </footer>
</body>

</html>