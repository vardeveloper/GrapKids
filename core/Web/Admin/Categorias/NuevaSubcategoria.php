<?php

class Web_Admin_Categorias_NuevaSubcategoria extends Web_Admin_MainPage
{

    public function mainContent()
    {
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
        $smarty->assign('cat_id', Ey::getPrm(3));

        return $smarty->fetch(ADMIN_CATEGORIAS_DIR . DS . 'tpl' . DS . 'insertar-subcategoria.tpl');
    }

}