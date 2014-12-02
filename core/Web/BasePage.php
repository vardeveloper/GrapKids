<?php

abstract class Web_BasePage extends HTMLDocument 
{

    public function __construct($title=NULL, $render_type=DOM::XHTML, $indent_style=DOM::INDENT_NICE) 
    {
        parent::__construct($title, $render_type, $indent_style);
        parent::set_charset('utf-8');
        parent::add_css_link(BASE_WEB_ROOT . '/css/reset.css');
        parent::add_css_link(BASE_WEB_ROOT . '/css/styles.css');
        parent::add_css_link(BASE_WEB_ROOT . '/css/paginador.css');
        parent::add_js_link('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
//        parent::add_js_link('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');
//        parent::add_js_link(BASE_WEB_ROOT . '/js/jquery.js');
        parent::add_js_link(BASE_WEB_ROOT . '/js/jquery.bgscroll.js');
        parent::add_js_link(BASE_WEB_ROOT . '/js/jquery.bxSlider.min.js');
        parent::add_js_link(BASE_WEB_ROOT . '/js/functions.js');
//        parent::add_js_link(BASE_WEB_ROOT . '/svc/get-js/functions');

        $this->contenido = new Container();
    }

    public function render() 
    {
        $smarty = new Smarty_Engine();
        $smarty->assign('Header', Web_Wgt_Header::render());
        $smarty->assign('Footer', Web_Wgt_Footer::render());
        $smarty->assign('Contenido', $this->mainContent());
        $this->add($smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'base-page.tpl'));
        echo parent::render();
    }

    public function obtenerId($obj, $pref, $key) 
    {
        $campId = $pref . '_id';
        $tabla = $obj->fetchRow($obj->select()->where($pref . '_key=?', $key));
        return $tabla->$campId;
    }

    public function obtenerKey($obj, $pref, $id) 
    {
        $campKey = $pref . '_key';
        $tabla = $obj->fetchRow($obj->select()->where($pref . '_id=?', $id));
        return $tabla->$campKey;
    }

    abstract protected function mainContent();
}