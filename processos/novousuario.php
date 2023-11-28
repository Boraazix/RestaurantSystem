<?php
require_once '../classes/util.class.php';
require_once '../classes/usuarioservices.class.php';

if(!Util::logged())
{
    header('Location:login.php');
} 
if (!empty($_POST['nome']))
{
    UsuarioServices::salvar($_POST['nome'], $_POST['email'], $_POST['senha']+0, date($_POST['nascimento']), $_POST['perfil'], !empty($_POST['carteira']), !empty($_POST['ativo']), $_POST['pin']+0);
    header('Location:../cadastrousuario.php?alert=1');
}
else {
    header('Location:../cadastrousuario.php');
}