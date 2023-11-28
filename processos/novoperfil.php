<?php
require_once '../classes/util.class.php';
require_once '../classes/perfilservices.class.php';

if(!Util::logged())
{
    header('Location:login.php');
} 
if (!empty($_POST['name']))
{
    PerfilServices::salvar($_POST['name']);
    header('Location:../cadastroperfil.php?alert=1');
}
else {
    header('Location:../cadastroperfil.php');
}