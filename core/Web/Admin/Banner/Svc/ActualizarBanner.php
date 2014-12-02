<?php

class Web_Admin_Banner_Svc_ActualizarBanner
{

    public function doIt()
    {
        $this->actualizar();
    }

    public function actualizar()
    {
        $ba_id = Ey::getPrm(4);
        $obj = new Web_Db_Banner();
        $row = array('ba_titulo' => $_POST['ba_titulo']);
        $obj->update($row, 'ba_id=' . $ba_id);

        $handle = new Ey_Upload($_FILES['imagen']);
        
        if ($handle->uploaded) {
            $handle->file_new_name_body = 'banner_' . $ba_id;
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