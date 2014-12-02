<?php

class Web_Admin_Productos_Svc_BloquearProducto
{

    public function doIt()
    {
        $this->activar();
    }

    private function activar()
    {
        $pro_id = Ey::getPrm(4);

        $opc = Ey::getPrm(5);

        $obj = new Web_Db_Productos();

        if ($opc) {
            $row = array('pro_estado' => '1');
        } else {
            $row = array('pro_estado' => '2');
        }

        $obj->update($row, 'pro_id=' . $pro_id);

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}