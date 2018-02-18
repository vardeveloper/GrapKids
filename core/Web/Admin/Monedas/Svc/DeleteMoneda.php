<?php

class Web_Admin_Monedas_Svc_DeleteMoneda {

    public function doIt() {
        global $db;
        $db->delete('gk_moneda', 'mon_id=' . Ey::getPrm(4));
        Ey::redirect(BASE_WEB_ROOT . '/admin/monedas');
    }

}