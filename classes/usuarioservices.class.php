<?php

require_once 'r.class.php';
require_once 'usuario.class.php';

class UsuarioServices
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

    public static function salvar($nome, $email, $senha, $nascimento, $perfil)
    {
        self::setupConnection();

        $usuario = R::dispense('usuario');

        $usuario = new Usuario($nome, $email, $senha, $nascimento, $perfil);
        $usuarioBean = Usuario::construir($usuario);

        R::store($usuarioBean);

        R::close();
    }

    public static function buscarTodos()
    {
        self::setupConnection();

        $devs = R::findAll('usuario');

        R::close();

        return $devs;
    }

    public static function deletar($id)
    {
        self::setupConnection();

        R::trash('usuario', $id);

        R::close();
    }

    public static function buscarPorId($id)
    {
        self::setupConnection();

        $dev = R::load('usuario', $id);

        R::close();

        return $dev;
    }
}