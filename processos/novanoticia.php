<?php
require_once '../classes/util.class.php';
require_once '../classes/noticiaservices.class.php';

if(!Util::logged())
{
    header('Location:login.php');
}
if (!empty($_POST['titulo']))
{
    date_default_timezone_set('America/Fortaleza');
    NoticiaServices::salvar($_POST['titulo'], $_POST['conteudo'], new DateTime(), $_POST['id']);
    header('Location:../cadastronoticia.php?alert=1');
}
else {
    header('Location:../cadastronoticia.php');
}