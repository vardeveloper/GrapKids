<?php

class Web_Admin_Delivery_Svc_GuardarDelivery {

    public function doIt() {
        $this->guardar();
    }

    public function guardar() {

        if ($_POST['distrito'] == '') {
            $error['distrito'] = 'Ingresar Distrito';
        }
        if ($_POST['codigo'] == '') {
            $error['codigo'] = 'Ingresar Codigo';
        }
        if ($_POST['precio'] == '') {
            $error['precio'] = 'Ingresar Precio';
        }
        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $obj = new Web_Db_Delivery();
        $row = array('del_distrito' => $_POST['distrito'],
                     'del_codigo' => $_POST['codigo'],
                     'del_precio' => $_POST['precio'],
                     'del_estado' => 1);
        $obj->insert($row);

        Ey::redirect(WEB_ROOT . '/admin/delivery');
    }

}