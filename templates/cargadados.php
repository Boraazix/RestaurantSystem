<?php
    require_once '../classes/r.class.php';
    require_once '../classes/perfilservices.class.php';

    R::setup('mysql:host=localhost;dbname=restaurante', 'root', '');

    PerfilServices::salvar("Administrador");

    R::close();