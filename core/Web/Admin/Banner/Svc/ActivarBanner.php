<?php

class Web_Admin_Banner_Svc_ActivarBanner
{

    public function doIt()
    {
        $this->activar();
    }

    private function activar()
    {
        $ba_id = Ey::getPrm(4);
        
        $opc = Ey::getPrm(5);
        
        $obj = new Web_Db_Banner();

        if ($opc == "1") {
            $row = array('ba_estado' => '1');
        } else {
            $row = array('ba_estado' => '0');
        }

        $obj->update($row, 'ba_id=' . $ba_id);

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}