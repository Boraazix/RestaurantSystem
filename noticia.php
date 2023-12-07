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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    main {
      padding: 20px;
    }

    .noticia-container {
      margin-bottom: 2rem;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #f9f9f9;
    }
  </style>
    <title>Sistema do Restaurante</title>
</head>

<body>
    <header>
        <?php include 'templates/header.inc.php' ?>
    </header>

    <main>
        <h1 class="mt-4 mb-4">Notícias do Restaurante</h1>
        <div class="noticia-container">
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