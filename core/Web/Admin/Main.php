<?php

class Web_Admin_Main extends Web_Admin_MainPage {

    public function mainContent() {
        if ($_SESSION['adm']['adm_estado'] == 0) {
            unset($_SESSION['adm']);
            Ey::redirect(WEB_ROOT . '/admin');
        } else {
            $obj = new Web_Db_Admin();
            $row = array('adm_ip' => getenv('REMOTE_ADDR'),
                        'adm_last_visit' => date('Y-m-d H:i:s'),
                        'adm_browser' => $_SERVER["HTTP_USER_AGENT"]);
            $obj->update($row, 'adm_id=' . $_SESSION['adm']['adm_id']);
        }

        return 'Bienvenidos al sistema de administración de contenidos.';
    }

}
