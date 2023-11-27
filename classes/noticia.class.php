<?php

// classes meramente ilustrativas
class Noticia extends \RedBeanPHP\SimpleModel
{
    public $titulo;
    public $texto;
    public $data;

    public function __construct($titulo, $texto, $data)
    {
        $this->titulo=$titulo;
        $this->texto=$texto;
        $this->data=$data;
    }

    public static function construir($noticiaEnt)
    {
        $noticiaBean = R::dispense('noticia');
        $noticiaBean->titulo=$noticiaEnt->titulo;
        $noticiaBean->texto=$noticiaEnt->texto;
        $noticiaBean->data=$noticiaEnt->data;
        return $noticiaBean;
    }
}