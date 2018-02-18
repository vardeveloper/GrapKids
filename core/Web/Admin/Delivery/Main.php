<?php

class Web_Admin_Delivery_Main extends Web_Admin_MainPage {

    public function mainContent() {
        parent::add_js_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.js');
        parent::add_css_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.css');

        if ($_SESSION['adm']['adm_tipo'] == 'administrador') {
            $user = new Web_Admin_Delivery_Wgt_Delivery($this);
            return $user->render();
        } else {
            $obj = new Web_Db_Privilegios();
            $rs = $obj->fetchRow($obj->select()
                                    ->where('mod_modulo=?', 'delivery')
                                    ->where('mod_id_admin=?', $_SESSION['adm']['adm_id']));

            if ($rs) {
                $user = new Web_Admin_Delivery_Wgt_Delivery($this);
                return $user->render();
            }
        }
    }

}