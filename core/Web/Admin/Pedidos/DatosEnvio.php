<?php

class Web_Admin_Pedidos_DatosEnvio extends Web_Admin_MainPage
{

    public function mainContent()
    {
        parent::add_js_link(BASE_WEB_ROOT . '/js/jquery.1.7.1.js');
        parent::add_js_link(BASE_WEB_ROOT . '/js/jquery.ui.1.8.16.js');
        parent::add_css_link(BASE_WEB_ROOT . '/css/jquery.ui.css');
        $this->add_css_link(BASE_WEB_ROOT . '/css/datepicker.css');
        $this->add_js_link(BASE_WEB_ROOT . '/js/datepicker.js');
        return $this->_getInsertarUsuario();
    }

    private function _getInsertarUsuario()
    {
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        
        if (isset($_SESSION['post'])) {
            $post = $_SESSION['post'];
            unset($_SESSION['post']);
        }

        $view = new Smarty_Engine();
        $view->assign('post', $post);
        $view->assign('error', $error);
        $view->assign('fecha', Web_Admin_Pedidos_Wgt_Fecha::render());

        return $view->fetch(ADMIN_PEDIDOS_DIR . DS . 'tpl' . DS . 'datos-envio.tpl');
    }

}