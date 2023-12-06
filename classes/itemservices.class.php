<?php

require_once 'r.class.php';

class ItemServices
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

    public static function salvar($venda, $produto, $quantidade)
    {
        self::setupConnection();

        $item = R::dispense('item');

        $item->venda = $venda;
        $item->produto = $produto;
        $item->quantidade = $quantidade;

        R::store($item);

        R::close();
    }

    public static function buscarTodos()
    {
        self::setupConnection();

        $itens = R::findAll('item');

        R::close();

        return $itens;
    }

    public static function buscarTodosPorVenda($venda)
    {
        self::setupConnection();

        $itens = R::findAll('venda', ' WHERE venda = ? ', [$venda]);

        R::close();

        return $itens;
    }

    public static function deletar($id)
    {
        self::setupConnection();

        R::trash('item', $id);

        R::close();
    }

    public static function buscarPorId($id)
    {
        self::setupConnection();

        $item = R::load('item', $id);

        R::close();

        return $item;
    }
}