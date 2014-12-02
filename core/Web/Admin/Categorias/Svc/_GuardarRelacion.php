<?php

class Web_Admin_Categorias_Svc_GuardarRelacion
{

    public function doIt()
    {
        $this->guardar();
    }

    private function guardar()
    {

        $pro_id = Ey::getPrm(4);

        $obj = new Web_Db_CategoriasDetalle();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from('gk_categorias_detalle')
                ->where('det_pro_id=?', $pro_id)
                ->where('det_padre_id=?', $_POST['cat']);
        
        if ($_POST['sub'] != '') {
            $select->where('det_cat_id=?', $_POST['sub']);
        } else {
            $_POST['sub'] = 0;
        }
        
        $rs = $db->fetchAll($select);

        if ($_POST['cat'] == '') {
            $error['cat'] = 'Seleccione la Categoria';
        } else {
            if (count($rs) > 0) {
                $error['cat'] = 'La Relacion ya se ha registrado';
            }
        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $row = array('det_cat_id' => $_POST['sub'],
            'det_padre_id' => $_POST['cat'],
            'det_pro_id' => $pro_id);

        $obj->insert($row);

        Ey::redirect(WEB_ROOT . '/admin/categorias/productos');
    }

}