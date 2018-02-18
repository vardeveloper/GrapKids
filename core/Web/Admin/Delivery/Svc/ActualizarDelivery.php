<?php

class Web_Admin_Delivery_Svc_ActualizarDelivery {

    public function doIt() {
        $this->actualizar();
    }

    public function actualizar() {
        $del_id = Ey::getPrm(4);
        $obj = new Web_Db_Delivery();
        $row = array('del_distrito' => $_POST['distrito'],
                    'del_codigo' => $_POST['codigo'],
                    'del_precio' => $_POST['precio']);
        $obj->update($row, 'del_id=' . $del_id);
        Ey::redirect(WEB_ROOT . '/admin/delivery');
    }

}