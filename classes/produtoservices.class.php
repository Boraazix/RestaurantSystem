<?php

require_once 'r.class.php';

class ProdutoServices
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

    public static function salvar($nome, $descricao, $preco)
    {
        self::setupConnection();

        $produto = R::dispense('produto');

        $produto->nome = $nome;
        $produto->descricao = $descricao;
        $produto->preco = $preco;

        R::store($produto);

    }

    public static function buscarTodos()
    {
        self::setupConnection();

        $produtos = R::findAll('produto');


        return $produtos;
    }

    public static function buscarTodosCrescente()
    {
        self::setupConnection();

        $produtos = R::findAll('produto', ' ORDER BY nome asc ');


        return $produtos;
    }

    public static function deletar($id)
    {
        self::setupConnection();

        R::trash('produto', $id);

    }

    public static function buscarPorId($id)
    {
        self::setupConnection();

        $produto = R::load('produto', $id);


        return $produto;
    }
}