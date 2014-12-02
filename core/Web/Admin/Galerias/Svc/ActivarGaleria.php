<?php

class Web_Admin_Galerias_Svc_ActivarGaleria {

    public function doIt() {
        $this->activar();
    }

    private function activar() {
        $gal_id = Ey::getPrm(4);

        $opc = Ey::getPrm(5);

        $obj = new Web_Db_Galerias();

        if ($opc == "1") {
            $row = array('gal_estado' => '1');
        } else {
            $row = array('gal_estado' => '0');
        }

        $obj->update($row, 'gal_id=' . $gal_id);

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}