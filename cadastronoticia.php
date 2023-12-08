<?php
require_once 'classes/r.class.php';
require_once 'classes/util.class.php';
require_once 'classes/noticiaservices.class.php';
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
    <script src="https://cdn.tiny.cloud/1/gxuhx0gkfdgl1ea1o40a4ul185r55j4iv6iy0p4n1exxe97z/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
        <h1>Cadastro de Notícias</h1>

        <form action="processos/novanoticia.php" method="post" class="mt-4">

            <div id="alert1" style="display: none;">
                <div class="alert alert-success" role="alert">
                    Notícia cadastrada com sucesso.
                </div>
            </div>
            <fieldset>
                <legend>Dados</legend>

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título da Notícia:</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título da Notícia"
                        required>
                </div>
                
                <div class="mb-3">
                    <label for="resumo" class="form-label">Resumo do conteúdo:</label>
                    <input type="text" name="resumo" id="resumo" class="form-control" style="width: 25rem"
                        placeholder="Resumo do conteúdo" required>
                </div>

                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">

                <script>
                    tinymce.init({
                        selector: 'textarea',
                        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                        menubar: false,
                        tinycomments_mode: 'embedded',
                        tinycomments_author: 'Author name',
                        mergetags_list: [
                            { value: 'First.Name', title: 'First Name' },
                            { value: 'Email', title: 'Email' },
                        ],
                        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
                    });
                </script>
                <textarea name="conteudo" id="conteudo" placeholder="Escreva a notícia aqui!"></textarea>

                <button type="submit" class="btn btn-danger mt-3">Postar</button>
            </fieldset>
        </form>
    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>
<?php R::close(); ?>