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

    public static function salvar($titulo, $texto, $data)
    {
        self::setupConnection();

        $noticia = R::dispense('noticia');

        $noticia = new Noticia($titulo, $texto, $data);
        $noticiaBean = Noticia::construir($noticia);

        R::store($noticiaBean);

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