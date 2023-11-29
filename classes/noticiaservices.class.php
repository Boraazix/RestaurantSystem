<?php

require_once 'r.class.php';
require_once 'noticia.class.php';

class NoticiaServices
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

    public static function salvar($titulo, $conteudo, $data)
    {
        self::setupConnection();

        $noticia = R::dispense('noticia');

        $noticia->titulo = $titulo;
        $noticia->conteudo = $conteudo;
        $noticia->data = $data;

        R::store($noticia);

        R::close();
    }

    public static function buscarTodos()
    {
        self::setupConnection();

        $noticias = R::findAll('noticia');

        R::close();

        return $noticias;
    }

    public static function deletar($id)
    {
        self::setupConnection();

        R::trash('noticia', $id);

        R::close();
    }
}