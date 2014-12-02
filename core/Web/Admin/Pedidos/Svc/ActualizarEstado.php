<?php

class Web_Admin_Pedidos_Svc_ActualizarEstado
{

    public function doIt()
    {
        $this->actualizarEstado();
    }

    private function actualizarEstado()
    {
        $id = Ey::getPost('id');
        $opc = Ey::getPost('opc');
        $obj = new Web_Db_Carrito();
        $row = array('car_estado' => $opc);
        $obj->update($row, 'car_id=' . $id);
        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}