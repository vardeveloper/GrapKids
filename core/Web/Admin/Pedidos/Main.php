<?php

class Web_Admin_Pedidos_Main extends Web_Admin_MainPage
{

    public function mainContent()
    {
        if ($_SESSION['adm']['adm_tipo'] == 'administrador') {
            $user = new Web_Admin_Pedidos_Wgt_Pedidos($this);
            return $user->render();
        } else {
            $obj = new Web_Db_Privilegios();
            $rs = $obj->fetchRow($obj->select()
                                    ->where('mod_modulo=?', 'pedidos')
                                    ->where('mod_id_admin=?', $_SESSION['adm']['adm_id']));

            if ($rs) {
                $user = new Web_Admin_Pedidos_Wgt_Pedidos($this);
                return $user->render();
            }
        }
    }

}