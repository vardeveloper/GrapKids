<?php

class Web_Admin_Productos_Svc_EliminarProducto
{

    public function doIt()
    {
        $this->eliminar();
    }

    private function eliminar()
    {
        $pro_id = Ey::getPrm(4);
        
        $obj = new Web_Db_Productos();
        
        $obj->delete('pro_id=' . $pro_id);
        
        //Imagen Principal
        @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '.jpg');
        @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_small.jpg');
        @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_1.jpg');
        @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_2.jpg');
        @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_3.jpg');
        @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_4.jpg');
        @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_5.jpg');
        @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_6.jpg');

        //Eliminar relacion producto-categoria
        $obj2 = new Web_Db_CategoriasDetalle();
        $db2 = $obj2->getAdapter();
        $rs = $db2->fetchAll($obj2->select()
                                  ->where('det_pro_id=?', $pro_id));
        foreach ($rs as $value) {
            $obj2->delete('det_pro_id=' . $value->det_pro_id);
        }

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}