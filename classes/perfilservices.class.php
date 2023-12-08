<?php

require_once 'r.class.php';

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

    }

    public static function buscarTodos()
    {
        self::setupConnection();

        $perfis = R::findAll('perfil');


        return $perfis;
    }

    public static function deletar($id)
    {
        self::setupConnection();

        R::trash('perfil', $id);

    }

    public static function buscarPorId($id)
    {
        self::setupConnection();

        $perfil = R::load('perfil', $id);

        
        return $perfil;
    }

    public static function buscarNovoId()
    {
        self::setupConnection();

        $ultimo = R::findOne('perfil', ' ORDER BY id DESC ');
        
        return $ultimo->id+1;
    }
}