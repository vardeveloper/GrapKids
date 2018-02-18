<?php

class Web_Admin_Galerias_Svc_GuardarFoto {

    public function doIt() {
        $this->guardar();
    }

    public function guardar() {
        $handle = new Ey_Upload($_FILES['imagen']);

        if (!$handle->uploaded) {
            $error['imagen'] = 'Debe indicar la ruta del archivo';
        }

//        if ($_POST['fot_titulo'] == '') {
//            $error['fot_titulo'] = 'Ingrese Titulo';
//        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;

            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $gal_id = Ey::getPrm(4);

        $obj = new Web_Db_Fotos();

        $row = array('fot_titulo' => $_POST['fot_titulo'],
                    'fot_gal_id' => $gal_id,
                    'fot_fecha' => date('y-m-d'));
                    //'gal_estado' => 0);

        $obj->insert($row);

        $id = $obj->getAdapter()->lastInsertId();

        if ($handle->uploaded) {
            $handle->file_new_name_body = 'fot_' . $id;
            $handle->file_new_name_ext = 'jpg';
//            $handle->image_resize = true;
//            $handle->image_ratio_crop = true;
//            $handle->image_x = 600;
//            $handle->image_y = 450;
//            $handle->image_watermark = APP_ROOT . DS . '_data/img/logo-grapkids-marca.png';
            $handle->process(APP_ROOT . DS . '_data/img/fotos');
            $handle->clean();
        }

        Ey::redirect(BASE_WEB_ROOT . '/admin/galerias/fotos/' . $gal_id);
    }

}