<?php
require_once 'classes/util.class.php';

if (!empty($_POST['email']) && !empty($_POST['senha'])) {
    Util::autenticar($_POST['email'], $_POST['senha']);
} else {
    header('Location:index.php?');
}
