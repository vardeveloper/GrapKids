<?php

class Web_Admin_Delivery_Svc_DeleteDelivery {

    public function doIt() {
        $this->eliminar();
    }

    private function eliminar() {
        $del_id = Ey::getPrm(4);
        $obj = new Web_Db_Delivery();
        $obj->delete('del_id=' . $del_id);
        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}