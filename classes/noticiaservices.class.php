<?php

require_once 'r.class.php';

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

    public static function salvar($titulo, $resumo, $conteudo, $data, $autor)
    {
        self::setupConnection();

        $noticia = R::dispense('noticia');

        $noticia->titulo = $titulo;
        $noticia->resumo = $resumo;
        $noticia->conteudo = $conteudo;
        $noticia->data = $data;
        $noticia->autor = $autor;

        R::store($noticia);

    }

    public static function buscarTodos()
    {
        self::setupConnection();

        $noticias = R::findAll('noticia');


        return $noticias;
    }

    public static function buscarTodosDecrescente()
    {
        self::setupConnection();

        $noticias = R::findAll('noticia', ' ORDER BY data desc');


        return $noticias;
    }

    public static function deletar($id)
    {
        self::setupConnection();

        R::trash('noticia', $id);

    }

    public static function buscarPorId($id)
    {
        self::setupConnection();

        $noticia = R::load('noticia', $id);


        return $noticia;
    }

    public static function buscarTres(){
        self::setupConnection();

        $noticias = R::findAll('noticia', ' ORDER BY data desc LIMIT 3');


        return $noticias;
    }
}