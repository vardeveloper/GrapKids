<?php

class Web_Admin_Pedidos_Svc_EliminarPedido
{

    public function doIt()
    {
        $this->activar();
    }

    private function activar()
    {
        $car_id = Ey::getPrm(4);

        $obj = new Web_Db_Carrito();

        $row = array('car_estado' => '0');

        $obj->update($row, 'car_id=' . $car_id);

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}