<?php

class Web_Admin_Categorias_Svc_ActualizarSubcategoria
{

    public function doIt()
    {
        $this->actualizar();
    }

    private function actualizar()
    {
        $sub_id = Ey::getPrm(4);

        $obj = new Web_Db_Categorias();

        $row = array('cat_padre_id' => $_POST['cat'],
            'cat_nombre' => $_POST['sub_nombre'],
            'cat_key' => Ey::urlAmigable($_POST['sub_nombre']));

        $obj->update($row, 'cat_id=' . $sub_id);

        Ey::redirect(WEB_ROOT . "/admin/categorias");
    }

}