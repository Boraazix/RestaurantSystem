<?php
require_once '../classes/util.class.php';
require_once '../classes/produtoservices.class.php';

if(!Util::logged())
{
    header('Location:login.php');
} 
if (!empty($_POST['nome']))
{
    ProdutoServices::salvar($_POST['nome'], $_POST['descricao'], $_POST['preco']+0);
    header('Location:../cadastroproduto.php?alert=1');
}
else {
    header('Location:../cadastroproduto.php');
}