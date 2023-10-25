<?php
    require_once '../classes/r.class.php';

    R::setup('mysql:host=localhost;dbname=restaurante', 'root', '');

    $perfil = R::dispense('perfil');
    $perfil->nome = "Gerente";

    R::store($perfil);

    $perfil = R::dispense('perfil');
    $perfil->nome = "Caixa";

    R::store($perfil);

    $perfil = R::dispense('perfil');
    $perfil->nome = "Cliente";

    R::store($perfil);
    R::close();