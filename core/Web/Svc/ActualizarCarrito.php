<?php

class Web_Svc_ActualizarCarrito
{

    public function doIt()
    {
        $this->actualizarCarrito();
    }

    private function actualizarCarrito()
    {
        $keys = array_keys($_POST);
        
        $car = new Ey_Carrito();
        
        foreach ($keys as $key) {
            if (preg_match('/^(\+|-)?\d+$/', $_POST[$key]) && $_POST[$key] > 0) {
                $car->updateItem($key, $_POST[$key]);
            }
        }

        Ey::goBack();
    }

}