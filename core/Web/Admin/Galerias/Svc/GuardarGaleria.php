<?php

class Web_Admin_Galerias_Svc_GuardarGaleria {

    public function doIt() {
        $this->guardar();
    }

    public function guardar() {
        
        $obj = new Web_Db_Galerias();
        $rs = $obj->fetchRow($obj->select()
                                ->where('gal_titulo=?', $_POST['gal_titulo']));
        
        if ($_POST['gal_titulo'] == '') {
            $error['gal_titulo'] = 'Ingrese el Titulo';
        } else {
            if (count($rs) > 0) {
                $error['gal_titulo'] = 'La Galeria ya se ha registrado';
            }
        }
        
        $handle = new Ey_Upload($_FILES['imagen']);
//        if (!$handle->uploaded) {
//            $error['imagen'] = 'Debe indicar la ruta del archivo';
//        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $row = array('gal_titulo' => $_POST['gal_titulo'],
                    'gal_key' => Ey::urlAmigable($_POST['gal_titulo']),
                    'gal_fecha' => date('y-m-d'),
                    'gal_estado' => 1);
        $obj->insert($row);

        $id = $obj->getAdapter()->lastInsertId();
        if ($handle->uploaded) {
            $handle->file_new_name_body = 'gal_' . $id;
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