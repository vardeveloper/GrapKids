<?php

class Web_Admin_Productos_Svc_DoSearch
{

    public function doIt()
    {
        $criterio = Ey::getPost('criterio');
        
        if ($criterio != "") {
            $v0 = urlencode($criterio);
        } else {
            $v0 = '...';
        }

        Ey::redirect(WEB_ROOT . '/admin/productos/busqueda/texto:' . $v0);
    }

}