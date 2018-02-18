<?php

class Web_Login extends Web_BasePage 
{

    public function mainContent() 
    {
        parent::set_title('Login | Grap Kids');
        parent::add_head_content('<meta name="Keywords" content="" />');
        parent::add_head_content('<meta name="Description" content="" />');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');

        $error = null;
        $post = null;
        $forgotPass = null;

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['post'])) {
            $post = $_SESSION['post'];
            unset($_SESSION['post']);
        }
        if (isset($_SESSION['forgotPass'])) {
            $forgotPass = $_SESSION['forgotPass'];
            unset($_SESSION['forgotPass']);
        }
        
        $smarty = new Smarty_Engine();
        $smarty->assign('post', $post);
        $smarty->assign('error', $error);
        $smarty->assign('forgotPass', $forgotPass);
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'login.tpl');
    }

}