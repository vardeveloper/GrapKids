<?php

class Web_Admin_Categorias_Svc_EliminarCategoria
{

    public function doIt()
    {
        $this->eliminar();
    }

    private function eliminar()
    {
        $cat_id = Ey::getPrm(4);
        $obj = new Web_Db_Categorias();
        $row = array('cat_estado' => '2');
        $obj->update($row, 'cat_id=' . $cat_id);

        //Eliminar relacion producto-categoria
        $obj2 = new Web_Db_CategoriasDetalle();
        $db = $obj2->getAdapter();
        $rs = $db->fetchAll($obj2->select()->where('det_padre_id=?', $cat_id));
        
        foreach ($rs as $value) {
            $obj2->delete('det_padre_id=' . $value->det_padre_id);
        }

//        $obj->delete('cat_id=' . $cat_id);
//        @unlink(DATA_DIR . DS . 'img' . DS . 'categorias' . DS . 'cat_' . $cat_id . '.jpg');
        
        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}