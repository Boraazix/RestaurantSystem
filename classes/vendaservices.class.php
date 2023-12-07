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

        $vendas = R::findAll('venda',  ' ORDER BY data_venda desc ');

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

        $vendas = R::findAll('venda', ' WHERE cliente = ? AND data_pagamento IS NULL ', [$cliente]);

        R::close();

        return $vendas;
    }

    public static function buscarTodosEmAberto()
    {
        self::setupConnection();

        $vendas = R::findAll('venda', ' WHERE data_pagamento IS NULL ');

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

    public static function buscarTres(){
        self::setupConnection();

        $vendas = R::findAll('venda', ' ORDER BY data_venda desc LIMIT 3');

        R::close();

        return $vendas;
    }

    public static function quitar($id){
        date_default_timezone_set('America/Fortaleza');
        self::setupConnection();

        $venda = R::load('venda', $id);

        $venda->data_pagamento = new DateTime();

        R::store($venda);

        R::close();
    }
}