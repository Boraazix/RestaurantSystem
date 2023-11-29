<?php
require_once 'classes/util.class.php';
require_once 'classes/noticiaservices.class.php';
if (!Util::logged()) {
    header('Location:login.php');
}
if ($_SESSION['perfil'] > 2) // ADM e Gerente podem
{
    header('Location:index.php');
}
if (isset($_GET['alert'])) {
    switch ($_GET['alert']) {
        case 1:
            ?>
            <!-- <script>alert("Notícia cadastrado com sucesso.")</script> -->
            <?php
            break;
    }
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
    <title>Sistema do Restaurante</title>
</head>

<body>
    <header>
        <?php include 'templates/header.inc.php' ?>
    </header>

    <main>
        <h1>Cadastro de Notícias</h1>

        <form action="processos/novanoticia.php" method="post">
            <input type="text" name="titulo" id="titulo" placeholder="Título da Notícia">
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

            <button type="submit">Postar</button>
        </form>
    </main>

    <footer>
        <a href="index.php">Página Inicial</a>
        <hr>
        <p>&copy;2023 - Matheus Vieira, Russell Edward & Vitor Gabriel</p>
    </footer>
</body>

</html>