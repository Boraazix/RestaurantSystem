<?php

class Util
{
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
        require_once 'r.class.php';

        R::setup('mysql:host=localhost;dbname=restaurante', 'root', '');

        $user = R::findOne('usuario', 'email = ? and senha = ?', [$email, md5($senha . 'antagonista')]);

        if (isset($user)) {
            session_start();
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['perfil'] = $user['perfil'];

            header('Location:index.php');
        }
        else {
            header('Location:login.php?alert=1');
        }

        R::close();
    }
}
