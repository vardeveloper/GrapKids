<?php

class Web_Admin_Categorias_Svc_ActualizarCategoria
{

    public function doIt()
    {
        $this->actualizar();
    }

    private function actualizar()
    {
        $cat_id = Ey::getPrm(4);

        $obj = new Web_Db_Categorias();

        $row = array('cat_nombre' => $_POST['cat_nombre'],
            'cat_title' => $_POST['cat_title'],
            'cat_description' => $_POST['cat_description'],
            'cat_keywords' => $_POST['cat_keywords'],
            'cat_analytics' => $_POST['cat_analytics'],
            'cat_key' => Ey::urlAmigable($_POST['cat_nombre']));

        $obj->update($row, 'cat_id=' . $cat_id);

//        $handle = new Ey_Upload($_FILES['imagen']);
//
//        if ($handle->uploaded) {
//            $handle->file_new_name_body = 'cat_' . $cat_id;
//            $handle->file_new_name_ext = 'jpg';
//            $handle->image_resize = true;
//            $handle->image_ratio_crop = true;
//            $handle->image_x = 990;
//            $handle->image_y = 193;
//            $handle->process(APP_ROOT . DS . '_data/img/categorias');
//            $handle->clean();
//        }

        Ey::redirect(WEB_ROOT . "/admin/categorias");
    }

}