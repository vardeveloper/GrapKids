<?php

class Web_Admin_Videos_Svc_EliminarVideo {

    public function doIt() {
        $this->eliminar();
    }

    private function eliminar() {
        $vid_id = Ey::getPrm(4);
        $obj = new Web_Db_Videos();
        $obj->delete('vid_id=' . $vid_id);
        Ey::redirect(WEB_ROOT . '/admin/videos');
    }

}