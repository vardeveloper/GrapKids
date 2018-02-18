<?php

class Web_Admin_Monedas_Svc_GuardarMonedas {

    public function doIt() {
        //print_r($_POST);
        global $db;

        $keys = array_keys($_POST);

        foreach ($keys as $key) {
            if ($key != 'submit2') {
                $row = array('mon_id' => $key,
                             'mon_valor' => 1 / $_POST[$key]);
                try {
                    $db->insert('gk_moneda', $row);
                } catch (Exception $e) {
                    $row2 = array('mon_valor' => 1 / $_POST[$key]);
                    $db->update('gk_moneda', $row2, 'mon_id=' . $key);
                }
            }
        }

        Ey::redirect(BASE_WEB_ROOT . '/admin/monedas');
    }

}