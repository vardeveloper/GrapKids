<?php

class Web_Admin_Banner_NuevoBanner extends Web_Admin_MainPage
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

        return $smarty->fetch(ADMIN_BANNER_DIR . DS . 'tpl' . DS . 'insertar-banner.tpl');
    }

}