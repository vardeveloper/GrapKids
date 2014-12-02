<?php

class Web_Admin_Productos_NuevoProducto extends Web_Admin_MainPage
{

    public function mainContent()
    {
        $this->add_js_link('http://code.jquery.com/jquery-latest.js');
        $this->add_js_link(BASE_WEB_ROOT . '/wgt/tiny_mce/tiny_mce.js');
        return $this->insertar();
    }

    private function insertar()
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

        $smarty = new Smarty_Engine();
        $smarty->assign('post', $post);
        $smarty->assign('error', $error);

        return $smarty->fetch(ADMIN_PRODUCTOS_DIR . DS . 'tpl' . DS . 'insertar-producto.tpl');
    }

}