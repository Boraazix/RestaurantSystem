<?php include_once("classes/r.class.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <style>
        main {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-body {
            line-height: 1.5;
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

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            require_once 'classes/noticiaservices.class.php';
            require_once 'classes/usuarioservices.class.php';

            $noticias = NoticiaServices::buscarTres();

            foreach ($noticias as $noticia) {
                $autor = UsuarioServices::buscarPorId($noticia->autor);
                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">
                                <?= $noticia->titulo ?>
                            </h3>
                            <p class="card-text">
                                <?= $noticia->resumo ?>
                            </p>
                            <p class="card-text"><small class="text-muted">Postado por
                                    <?= $autor->nome ?> em
                                    <?= $noticia->data ?>
                                </small></p>
                            <a href="noticia.php?id=<?= $noticia->id ?>" class="btn btn-primary">Ver notícia</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <a href="noticias.php" class="btn btn-secondary mt-4">Veja mais notícias</a>
    </main>

    <footer class="bg-light text-center mt-5 py-3">
        <p>&copy;2023 - Matheus Vieira, Russell Edward & Vitor Gabriel</p>
    </footer>
</body>

</html>
<?php R::close(); ?>