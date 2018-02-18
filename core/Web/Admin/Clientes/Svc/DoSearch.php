<?php

class Web_Admin_Clientes_Svc_DoSearch
{

    public function doIt()
    {
        $criterio = Ey::getPost('criterio');
        
        if ($criterio != "") {
            $v0 = urlencode($criterio);
        } else {
            $v0 = '...';
        }

        Ey::redirect(WEB_ROOT . '/admin/clientes/busqueda/texto:' . $v0);
    }

}