<?php
require_once 'r.class.php';
class Util
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
    public static function logout()
    {
        if(!isset($_SESSION)) session_start();
        session_destroy();
        header('Location:index.php');
    }

    public static function logged()
    {
        if(!isset($_SESSION)) session_start();
        return isset($_SESSION['nome']);
    }

    public static function autenticar($email, $senha)
    {
        self::setupConnection();

        require_once 'r.class.php';

        $usuario = R::findOne('usuario', 'email = ? and senha = ?', [$email, md5($senha . 'antagonista')]);

        if ($email != 'anonimo@mail' && isset($usuario)) {


            if(!$usuario['ativo'])
            {
                header('Location:login.php?alert=2');
            }
            else
            {
                session_start();

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['perfil'] = $usuario['perfil'];
                $_SESSION['carteira'] = $usuario['carteira'];
                $_SESSION['ativo'] = $usuario['ativo'];
    
                header('Location:index.php');
            }
        }
        else {
            header('Location:login.php?alert=1');
        }

    }

    public static function validarPin($id, $pin)
    {
        self::setupConnection();

        require_once 'r.class.php';

        $usuario = R::load('usuario', $id);

        if(md5($pin . 'antagonista')==$usuario['pin'])
        {
            return true;
        }
        return false;

    }
}
