<?php

class Web_Admin_Clientes_InsertarCliente extends Web_Admin_MainPage
{

    public function mainContent()
    {
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

        return $view->fetch(ADMIN_CLIENTES_DIR . DS . 'tpl' . DS . 'insertar-cliente.tpl');
    }

}