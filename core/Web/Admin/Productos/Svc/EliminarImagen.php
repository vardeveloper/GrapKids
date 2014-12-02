<?php

class Web_Admin_Productos_Svc_EliminarImagen
{

    public function doIt()
    {
        $this->eliminar();
    }

    private function eliminar()
    {
        $pro_id = Ey::getPrm(4);
        
        $opc = Ey::getPrm(5);

        if ($opc == 1) {
            @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_1.jpg');
        } elseif ($opc == 2) {
            @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_2.jpg');
        } elseif ($opc == 3) {
            @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_3.jpg');
        } elseif ($opc == 4) {
            @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_4.jpg');
        } elseif ($opc == 5) {
            @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_5.jpg');
        } elseif ($opc == 6) {
            @unlink(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $pro_id . '_6.jpg');
        }

        Ey::redirect(WEB_ROOT . '/admin/productos/detalle-producto/' . $pro_id);
    }

}