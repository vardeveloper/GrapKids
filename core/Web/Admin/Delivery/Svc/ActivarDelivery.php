<?php

class Web_Admin_Delivery_Svc_ActivarDelivery {

    public function doIt() {
        $this->activar();
    }

    private function activar() {
        $del_id = Ey::getPrm(4);
        $opc = Ey::getPrm(5);
        $obj = new Web_Db_Delivery();
        if ($opc == 1) {
            $row = array('del_estado' => '1');
        } else {
            $row = array('del_estado' => '0');
        }
        $obj->update($row, 'del_id=' . $del_id);

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}