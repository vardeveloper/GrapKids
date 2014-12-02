<?php

class Web_Admin_Pedidos_Svc_ActivarEstado
{

    public function doIt()
    {
        $this->activar();
    }

    private function activar()
    {
        $car_id = Ey::getPrm(4);

        $opc = Ey::getPrm(5);

        $obj = new Web_Db_Carrito();

        if ($opc == 1) {
            $row = array('car_estado' => '1');
        } else {
            $row = array('car_estado' => '0');
        }

        $obj->update($row, 'car_id=' . $car_id);

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}