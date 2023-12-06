<?php

require_once 'r.class.php';

class VendaServices
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

    public static function salvar($cliente, $vendedor, $dataVenda, $dataPagamento)
    {
        self::setupConnection();

        $venda = R::dispense('venda');

        $venda->cliente = $cliente;
        $venda->vendedor = $vendedor;
        $venda->dataVenda = $dataVenda;
        $venda->dataPagamento = $dataPagamento;

        $id = R::store($venda);

        R::close();

        return $id;
    }

    public static function buscarTodos()
    {
        self::setupConnection();

        $vendas = R::findAll('venda');

        R::close();

        return $vendas;
    }

    public static function buscarTodosPorCliente($cliente)
    {
        self::setupConnection();

        $vendas = R::findAll('venda', ' WHERE cliente = ? ', [$cliente]);

        R::close();

        return $vendas;
    }

    public static function buscarTodosPorClienteEmAberto($cliente)
    {
        self::setupConnection();

        $vendas = R::findAll('venda', ' WHERE cliente = ? AND dataPagamento IS NULL ', [$cliente]);

        R::close();

        return $vendas;
    }

    public static function buscarTodosEmAberto()
    {
        self::setupConnection();

        $vendas = R::findAll('venda', ' WHERE dataPagamento IS NULL ');

        R::close();

        return $vendas;
    }

    public static function buscarTodosPorVendedor($vendedor)
    {
        self::setupConnection();

        $vendas = R::findAll('venda', ' WHERE vendedor = ? ', [$vendedor]);

        R::close();

        return $vendas;
    }

    public static function deletar($id)
    {
        self::setupConnection();

        R::trash('venda', $id);

        R::close();
    }

    public static function buscarPorId($id)
    {
        self::setupConnection();

        $venda = R::load('venda', $id);

        R::close();

        return $venda;
    }
}