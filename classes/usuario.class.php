<?php

class Usuario extends \RedBeanPHP\SimpleModel
{
    public $nome; 
    public $email; 
    public $senha; 
    public $nascimento; 
    public $perfil; 

    public function __construct($nome, $email, $senha, $nascimento, $perfil)
    {
        $this->nome=$nome;
        $this->email=$email;
        $this->senha=md5($senha . 'antagonista');
        $this->nascimento=$nascimento;
        $this->perfil=$perfil;
    }
}