<?php

class PagesModule extends WebModule
{

    public static function name()
    {
        return 'Страницы';
    }


    public static function description()
    {
        return 'Модуль статических страниц';
    }


    public function init()
    {
        parent::init();
        
        $this->setImport(array(
            'pages.models.*',
        ));
    }


}
