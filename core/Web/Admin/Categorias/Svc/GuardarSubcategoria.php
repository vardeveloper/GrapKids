<?php

class Web_Admin_Categorias_Svc_GuardarSubcategoria
{

    public function doIt()
    {
        $this->guardar();
    }

    private function guardar()
    {
        $obj = new Web_Db_Categorias();
        $rs = $obj->fetchRow($obj->select()
                                ->where('cat_nombre = ?', $_POST['sub_nombre']));

        if ($_POST['sub_nombre'] == '') {
            $error['sub_nombre'] = 'Ingrese Nombre';
        } else {
            if (count($rs) > 0) {
                $error['sub_nombre'] = 'La SubCategoria ya se ha registrado';
            }
        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $cat_id = Ey::getPrm(4);

        $row = array('cat_padre_id' => $cat_id,
            'cat_nombre' => $_POST['sub_nombre'],
            'cat_estado' => 0,
            'cat_key' => Ey::urlAmigable($_POST['sub_nombre']));

        $obj->insert($row);

        Ey::redirect(WEB_ROOT . '/admin/categorias');
    }

}