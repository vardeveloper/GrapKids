<?php

class Web_Admin_Videos_Svc_ActivarVideo {

    public function doIt() {
        $this->activar();
    }

    private function activar() {
        $vid_id = Ey::getPrm(4);
        $opc = Ey::getPrm(5);
        $obj = new Web_Db_Videos();

        if ($opc == "1") {
            $row = array('vid_estado' => '1');
        } else {
            $row = array('vid_estado' => '0');
        }

        $obj->update($row, 'vid_id=' . $vid_id);

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}