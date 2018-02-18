<?php

class Web_Admin_Pedidos_Svc_DoSearch
{

    public function doIt()
    {
        $criterio = Ey::getPost('criterio');
        
        if ($criterio != "") {
            $v0 = urlencode($criterio);
        } else {
            $v0 = 'todo';
        }

        Ey::redirect(WEB_ROOT . '/admin/pedidos/busqueda/texto:' . $v0);
    }

}