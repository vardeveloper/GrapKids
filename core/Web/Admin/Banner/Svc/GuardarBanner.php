<?php

class Web_Admin_Banner_Svc_GuardarBanner
{

    public function doIt()
    {
        $this->guardar();
    }

    public function guardar()
    {
        if ($_POST['ba_titulo'] == '') {
            $error['ba_titulo'] = 'Ingresar Titulo';
        }

        $handle = new Ey_Upload($_FILES['imagen']);
        if (!$handle->uploaded) {
            $error['imagen'] = 'Debe indicar la ruta del archivo';
        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $obj = new Web_Db_Banner();
        $row = array('ba_titulo' => $_POST['ba_titulo'], 'ba_estado' => 1);
        $obj->insert($row);
        $id = $obj->getAdapter()->lastInsertId();
        
        if ($handle->uploaded) {
            $handle->file_new_name_body = 'banner_' . $id;
            $handle->file_new_name_ext = 'jpg';
//            $handle->image_resize = true;
//            $handle->image_ratio_crop = true;
//            $handle->image_x = 660;
//            $handle->image_y = 328;
//            $handle->image_watermark = APP_ROOT . DS . '_data/img/marcaaguagrapkids.png';
            $handle->process(APP_ROOT . DS . '_data/img/banner');
            $handle->clean();
        }

        Ey::redirect(WEB_ROOT . '/admin/banner');
    }

}