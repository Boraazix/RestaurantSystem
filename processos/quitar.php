<?php
require_once '../classes/vendaservices.class.php';
require_once '../classes/util.class.php';

if (!Util::logged()) {
    header('Location:login.php');
}

if (!isset($_GET['id'])) {
    header('Location:relatoriodebitos.php');
}

if (isset($_GET['id'])) {
    $venda = $_GET['id'];
    VendaServices::quitar($venda);
    header('Location:../relatoriodebitos.php?alert=1');
}