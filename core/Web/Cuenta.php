<?php

class Web_Cuenta extends Web_BasePage 
{

    public function mainContent() 
    {
        parent::set_title('Mi Cuenta | Grap Kids');
        parent::add_head_content('<meta name="Keywords" content="" />');
        parent::add_head_content('<meta name="Description" content="" />');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');

        $error = null;
        $post = null;
        $envio = null;

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['post'])) {
            $post = $_SESSION['post'];
            unset($_SESSION['post']);
        }
        if (isset($_SESSION['envio'])) {
            $envio = $_SESSION['envio'];
            unset($_SESSION['envio']);
        }

        global $db;
        $rs = $db->fetchRow($db->select()
                                ->from('gk_clientes')
                                ->where('cli_id=?', $_SESSION['usr']['cli_id']));

//        print_r($rs);
        
        $smarty = new Smarty_Engine();
        $smarty->assign('post', $post);
        $smarty->assign('error', $error);
        $smarty->assign('envio', $envio);
        $smarty->assign('cliente', $rs);
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'cuenta.tpl');
    }

}