<?php

class Web_Admin_Videos_Svc_GuardarVideo {

    public function doIt() {
        $this->guardar();
    }

    public function guardar() {

        if ($_POST['vid_titulo'] == '') {
            $error['vid_titulo'] = 'Ingresar Titulo';
        }
        if ($_POST['vid_link'] == '') {
            $error['vid_link'] = 'Ingresar Link';
        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $obj = new Web_Db_Videos();
        $row = array('vid_titulo' => $_POST['vid_titulo'],
                     'vid_link' => $_POST['vid_link'],
                     'vid_key' => Ey::urlAmigable($_POST['vid_titulo']),
                     'vid_estado' => 1);
        $obj->insert($row);

        Ey::redirect(WEB_ROOT . '/admin/videos');
    }

}