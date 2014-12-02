<?php

class Web_Admin_Categorias_Svc_ActivarCategoria
{

    public function doIt()
    {
        $this->activar();
    }

    private function activar()
    {

        $cat_id = Ey::getPrm(4);

        $opc = Ey::getPrm(5);

        $obj = new Web_Db_Categorias();

        if ($opc == "1") {
            $row = array('cat_estado' => '1');
        } else {
            $row = array('cat_estado' => '0');
        }

        $obj->update($row, 'cat_id=' . $cat_id);

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}