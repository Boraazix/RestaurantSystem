<?php

require_once 'r.class.php';

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

    public static function salvar($nome, $email, $senha, $nascimento, $perfil, $carteira, $ativo, $pin)
    {
        self::setupConnection();

        $usuario = R::dispense('usuario');

        $usuario->nome = $nome;
        $usuario->email = $email;
        $usuario->senha = md5($senha . 'antagonista');
        $usuario->nascimento = $nascimento;
        $usuario->perfil = $perfil;
        $usuario->carteira = $carteira;
        $usuario->ativo = $ativo;
        $usuario->pin = md5($pin . 'antagonista');

        R::store($usuario);

        R::close();
    }
    
    public static function atualizar($id, $nome, $email, $senha, $nascimento, $perfil, $carteira, $ativo, $pin)
    {
        self::setupConnection();

        $usuarioEditado = R::dispense('usuario');

        $usuarioEditado->id = $id;
        $usuarioEditado->nome = $nome;
        $usuarioEditado->email = $email;
        $usuarioEditado->senha = md5($senha . 'antagonista');
        $usuarioEditado->nascimento = $nascimento;
        $usuarioEditado->perfil = $perfil;
        $usuarioEditado->carteira = $carteira;
        $usuarioEditado->ativo = $ativo;
        $usuarioEditado->pin = md5($pin . 'antagonista');

        R::store($usuarioEditado);

        R::close();
    }

    public static function buscarTodos()
    {
        self::setupConnection();

        $usuario = R::findAll('usuario');

        R::close();

        return $usuario;
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

        $usuario = R::load('usuario', $id);

        R::close();

        return $usuario;
    }
}