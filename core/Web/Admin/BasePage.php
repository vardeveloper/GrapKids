<?php

abstract class Web_Admin_BasePage extends HTMLDocument
{

    public function __construct($title = NULL, $render_type = DOM::XHTML, $indent_style = DOM::INDENT_NICE)
    {
        parent::set_charset('utf-8');
        parent::__construct($title, $render_type, $indent_style);
        parent::add_css_link(BASE_WEB_ROOT . '/css/reset-admin.css');
        parent::add_css_link(BASE_WEB_ROOT . '/css/admin.css');
        parent::add_css_link(BASE_WEB_ROOT . '/css/grid.css');
        parent::add_css_link(BASE_WEB_ROOT . '/css/tables.css');
        parent::add_css_link(BASE_WEB_ROOT . '/css/navigation.css');
        parent::add_js_link(BASE_WEB_ROOT . '/js/mootools_core.js');
        parent::add_js_link(BASE_WEB_ROOT . '/js/mootools_more.js');
        parent::set_title("Administrador de Contenidos");
    }

    public function render()
    {

//        echo Ey::decrypt('Yx97wUqZbJY3kCkA88+6DG3Up+BfvnDIPmUvKWVdrhk=');

        $smarty = new Smarty_Engine();
        $smarty->assign('globalcontent', $this->getContent());

        $html = '';

        if (Ey_Login::isLogged('adm')) {
            $html.='<div class="adm r">Bienvenido, ' . $_SESSION['adm']['adm_user'] . '
                    <a class="adm_btn_ok" href="' . WEB_ROOT . '/admin/svc/lo-off">
                    [CERRAR SESION]</a></div>';
        }

        $smarty->assign('html', $html);
        $this->add($smarty->fetch(APP_ROOT . DS . 'Admin' . DS . 'tpl' . DS . 'basepage.tpl'));

        echo parent::render();
    }

    abstract protected function getContent();
}