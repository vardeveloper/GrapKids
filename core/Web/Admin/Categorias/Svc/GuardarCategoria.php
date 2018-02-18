<?php

class Web_Admin_Categorias_Svc_GuardarCategoria
{

    public function doIt()
    {
        $this->guardar();
    }

    private function guardar()
    {
        $obj = new Web_Db_Categorias();
        $rs = $obj->fetchRow($obj->select()
                                ->where('cat_nombre = ?', $_POST['cat_nombre']));

        if ($_POST['cat_nombre'] == '') {
            $error['cat_nombre'] = 'Ingrese Nombre';
        } else {
            if (count($rs) > 0) {
                $error['cat_nombre'] = 'La Categoria ya se ha registrado';
            }
        }

//        $handle = new Ey_Upload($_FILES['imagen']);
//        if (!$handle->uploaded) {
//            $error['imagen'] = 'Debe indicar la ruta del archivo';
//        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $row = array('cat_nombre' => $_POST['cat_nombre'],
            'cat_title' => $_POST['cat_title'],
            'cat_description' => $_POST['cat_description'],
            'cat_keywords' => $_POST['cat_keywords'],
            'cat_analytics' => $_POST['cat_analytics'],
            'cat_estado' => 1,
            'cat_padre_id' => 0,
            'cat_key' => Ey::urlAmigable($_POST['cat_nombre']));

        $obj->insert($row);

//        $id = $obj->getAdapter()->lastInsertId();
//
//        if ($handle->uploaded) {
//            $handle->file_new_name_body = 'cat_' . $id;
//            $handle->file_new_name_ext = 'jpg';
//            $handle->image_resize = true;
//            $handle->image_ratio_crop = true;
//            $handle->image_x = 990;
//            $handle->image_y = 193;
//            $handle->process(APP_ROOT . DS . '_data/img/categorias');
//            $handle->clean();
//        }

        Ey::redirect(WEB_ROOT . '/admin/categorias');
    }

}