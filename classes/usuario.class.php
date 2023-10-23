<?php

class Usuario extends \RedBeanPHP\SimpleModel
{
    public $nome; //string
    public $email; //string
    public $senha; //string
    public $nascimento; //string
    public $perfil; //char (G:Gerente, C:Cliente, X:Caixa)

    public function __construct($nome, $email, $senha, $nascimento, $perfil)
    {
        $this->nome=$nome;
        $this->email=$email;
        $this->senha=md5($senha . 'antagonista');
        $this->nascimento=$nascimento;
        $this->perfil=$perfil;
    }
}