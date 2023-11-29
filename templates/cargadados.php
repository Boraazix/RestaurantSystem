<?php
    require_once '../classes/r.class.php';
    require_once '../classes/perfilservices.class.php';
    require_once '../classes/usuarioservices.class.php';

    R::setup('mysql:host=localhost;dbname=restaurante', 'root', '');

    UsuarioServices::salvar('Simba', 'simba@mail', '123', date('Y-m-d'), 1, false, true, 1234);

    PerfilServices::salvar("Administrador");
    PerfilServices::salvar("Gerente");
    PerfilServices::salvar("Caixa");
    PerfilServices::salvar("Cliente");

    R::close();