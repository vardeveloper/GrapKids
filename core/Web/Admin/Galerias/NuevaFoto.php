<?php

class Web_Admin_Galerias_NuevaFoto extends Web_Admin_MainPage {

    public function mainContent() {
        return $this->insertar();
    }

    private function insertar() {

        $gal_id = Ey::getPrm(3);

        $error = '';
        $post = '';

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
        $smarty->assign('gal_id', $gal_id);

        return $smarty->fetch(ADMIN_GALERIAS_DIR . DS . 'tpl' . DS . 'insertar-foto.tpl');
    }

}