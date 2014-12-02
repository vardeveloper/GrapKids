<?php

class Web_Admin_Banner_Svc_EliminarBanner
{

    public function doIt()
    {
        $this->eliminar();
    }

    private function eliminar()
    {
        $ba_id = Ey::getPrm(4);
        
        $obj = new Web_Db_Banner();
        
        $obj->delete('ba_id=' . $ba_id);
        
        @unlink(DATA_DIR . DS . 'img' . DS . 'banner' . DS . 'banner_' . $ba_id . '.jpg');
        
        Ey::redirect(WEB_ROOT . '/admin/banner');
    }

}