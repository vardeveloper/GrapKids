<?php

class Web_Admin_Productos_Svc_EliminarRelacion
{

    public function doIt()
    {
        $this->eliminar();
    }

    private function eliminar()
    {
        $rel_id = Ey::getPrm(4);
        
        $obj = new Web_Db_CategoriasDetalle();
        
        $obj->delete('det_id=' . $rel_id);
        
        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}