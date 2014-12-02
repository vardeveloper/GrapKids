<?php

class Web_Admin_Login extends Web_Admin_BasePage {

    public function getContent() {
        $error = null;
        $post = null;

        if (isset($_SESSION['erroruser'])) {
            $error = $_SESSION['erroruser'];
            $post = $_SESSION['postuser'];
            unset($_SESSION['erroruser']);
            unset($_SESSION['postuser']);
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('error', $error);
        $smarty->assign('post', $post);

        $html = $smarty->fetch(ADMIN_ROOT . DS . 'tpl' . DS . 'login.tpl');

        return $html;
    }

    public function loginControl() {
        if (!Ey_Login::isLogged('adm')) {
            $obj = new Web_Admin_Login();
            $obj->render();
            exit();
        }
    }

}