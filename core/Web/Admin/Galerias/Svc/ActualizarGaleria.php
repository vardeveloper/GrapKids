<?php

class Web_Admin_Galerias_Svc_ActualizarGaleria {

    public function doIt() {
        $this->actualizar();
    }

    public function actualizar() {
        if ($_POST['gal_titulo'] == '') {
            $error['gal_titulo'] = 'Ingrese Titulo';
        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $gal_id = Ey::getPrm(4);
        $obj = new Web_Db_Galerias();
        $row = array('gal_titulo' => $_POST['gal_titulo'],
                     'gal_key' => Ey::urlAmigable($_POST['gal_titulo']));
        $obj->update($row, 'gal_id=' . $gal_id);

        $handle = new Ey_Upload($_FILES['imagen']);
        if ($handle->uploaded) {
            $handle->file_new_name_body = 'gal_' . $gal_id;
            $handle->file_new_name_ext = 'jpg';
            //$handle->image_resize = true;
            //$handle->image_x = 1002;
            //$handle->image_y = 550;
            $handle->process(APP_ROOT . DS . '_data/img/galerias');
            $handle->clean();
        }

        Ey::redirect(BASE_WEB_ROOT . '/admin/galerias');
    }

}