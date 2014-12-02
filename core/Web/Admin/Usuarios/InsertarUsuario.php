<?php

class Web_Admin_Usuarios_InsertarUsuario extends Web_Admin_MainPage
{

    public function mainContent()
    {
        $this->add_js_link(BASE_WEB_ROOT . '/admin/svc/get-js/ajaxcombo');
        return $this->_getInsertarUsuario();
    }

    private function _getInsertarUsuario()
    {
        $error = null;
        $post = null;
        
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
        $view->assign('date', date('Y-m-d'));

        return $view->fetch(ADMIN_USUARIOS_DIR . DS . 'tpl' . DS . 'insertar-usuario.tpl');
    }

}