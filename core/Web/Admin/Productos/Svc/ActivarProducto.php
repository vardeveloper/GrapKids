<?php

class Web_Admin_Productos_Svc_ActivarProducto
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
        
        if ($opc == "1") {
            $row = array('pro_estado' => '1');
        } else {
            $row = array('pro_estado' => '0', 'pro_fecha_update' => date('Y-m-d:H-i-s'));
        }
        
        $obj->update($row, 'pro_id=' . $pro_id);
        
        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}