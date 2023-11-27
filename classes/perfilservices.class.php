<?php

require_once 'r.class.php';
require_once 'perfil.class.php';

class PerfilServices 
{
    private static function setupConnection()
    {
        if (!R::testConnection()) {
            R::setup(
                'mysql:host=localhost;dbname=restaurante',
                'root',
                ''
            );
        }
    }

    public static function salvar($name)
    {
        self::setupConnection();

        $perfil = R::dispense('perfil');

        $perfil->nome = $name;

        R::store($perfil);

        R::close();
    }

    public static function buscarTodos()
    {
        self::setupConnection();

        $perfis = R::findAll('perfil');

        R::close();

        return $perfil;
    }

    public static function deletar($id)
    {
        self::setupConnection();

        R::trash('perfil', $id);

        R::close();
    }

    public static function buscarNovoId()
    {
        self::setupConnection();

        $ultimo = R::findOne('perfil', ' ORDER BY id DESC ');
        
        return $ultimo->id+1;
    }
}