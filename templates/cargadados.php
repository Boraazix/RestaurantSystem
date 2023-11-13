<?php
    require_once '../classes/r.class.php';
    require_once '../classes/usuarioservices.class.php';

    R::setup('mysql:host=localhost;dbname=restaurante', 'root', '');

    UsuarioServices::salvar("admin", "admin@mail.com", "admin", "2004-07-15 19:30:00", 1);

    R::close();