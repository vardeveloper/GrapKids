<?php

class Web_Admin_Videos_Svc_ActualizarVideo {

    public function doIt() {
        $this->actualizar();
    }

    public function actualizar() {
        $vid_id = Ey::getPrm(4);
        $obj = new Web_Db_Videos();
        $row = array('vid_titulo' => $_POST['vid_titulo'],
                     'vid_link' => $_POST['vid_link'],
                     'vid_key' => Ey::urlAmigable($_POST['vid_titulo']),);
        $obj->update($row, 'vid_id=' . $vid_id);

        Ey::redirect(WEB_ROOT . '/admin/videos');
    }

}