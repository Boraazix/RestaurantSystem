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

        R::close();
    }

    public static function buscarTodos()
    {
        self::setupConnection();

        $produtos = R::findAll('produto');

        R::close();

        return $produtos;
    }

    public static function buscarTodosCrescente()
    {
        self::setupConnection();

        $produtos = R::findAll('produto', ' ORDER BY nome asc ');

        R::close();

        return $produtos;
    }

    public static function deletar($id)
    {
        self::setupConnection();

        R::trash('produto', $id);

        R::close();
    }

    public static function buscarPorId($id)
    {
        self::setupConnection();

        $produto = R::load('produto', $id);

        R::close();

        return $produto;
    }
}