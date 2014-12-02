<?php

class Web_Registro extends Web_BasePage 
{

    public function mainContent() 
    {
        parent::set_title('Registro de Nuevo Cliente | Grap Kids');
        parent::add_head_content('<meta name="Keywords" content="" />');
        parent::add_head_content('<meta name="Description" content="" />');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');

        $error = array();
        $post = array();

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'] ? $_SESSION['error'] : null;
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['post'])) {
            $post = $_SESSION['post'] ? $_SESSION['post'] : null;
            unset($_SESSION['post']);
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('post', $post);
        $smarty->assign('error', $error);
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'registro.tpl');
    }

}