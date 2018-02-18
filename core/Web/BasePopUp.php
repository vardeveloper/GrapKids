<?php

abstract class Web_BasePopUp extends HTMLDocument 
{
    public function __construct($title = NULL, $render_type = DOM::XHTML, $indent_style=DOM::INDENT_NICE) 
    {
        parent::__construct($title, $render_type, $indent_style);
        parent::set_charset('utf-8');
    }

    public function render() 
    {
        $smarty = new Smarty_Engine();
        $smarty->assign('contenido', $this->mainContent());
        $this->add($smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'base_pop_up.tpl'));
        echo parent::render();
    }

    abstract protected function mainContent();
}