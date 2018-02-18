<?php

class Web_Admin_Productos_Svc_GuardarRelacion
{

    public function doIt()
    {
        $this->guardar();
    }

    private function guardar()
    {
        $cat_id = Ey::getPrm(4);
        $sub_id = Ey::getPrm(5);
        $pro_id = Ey::getPrm(6);

        $obj = new Web_Db_CategoriasDetalle();
        $rs = $obj->fetchRow($obj->select()
                                ->where('det_padre_id=?', $cat_id)
                                ->where('det_cat_id=?', $sub_id)
                                ->where('det_pro_id=?', $pro_id));

        if (count($rs) > 0) {
            $error['cat'] = '<p style="color:#D60000;text-align:center"><b>La Relacion ya se ha registrado</b></p>';
        }

        if (count($error) > 0) {
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $row = array('det_cat_id' => $sub_id,
                    'det_padre_id' => $cat_id,
                    'det_pro_id' => $pro_id);

        $obj->insert($row);

        Ey::redirect(WEB_ROOT . '/admin/productos/categorias/' . $pro_id);
    }

}