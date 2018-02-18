<?php

class Web_Admin_Usuarios_ActualizarUsuario extends Web_Admin_MainPage
{

    public function mainContent()
    {
        return $this->mostrarForm();
    }

    private function mostrarForm()
    {
        $error = null;

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        
        $adm_id = Ey::getPrm(3);

        $obj = new Web_Db_Admin();
        $db = $obj->getAdapter();
        $rs = $db->fetchRow($obj->select()
                                ->from('gk_admin', array('adm_id', 'adm_nombre', 'adm_apellido', 'adm_email', 'adm_user'))
                                ->where('adm_id=?', $adm_id));
        
//        print_r($rs);

        $motor = new Smarty_Engine();
        $motor->assign('usuario', $rs);
        $motor->assign('error', $error);

        return $motor->fetch(ADMIN_USUARIOS_DIR . DS . 'tpl' . DS . 'actualizar-usuario.tpl');
    }

}
