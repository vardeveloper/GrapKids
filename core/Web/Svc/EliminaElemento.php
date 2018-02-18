<?php

class Web_Svc_EliminaElemento
{

    public function doIt()
    {
        $art_id = Ey::getPrm(2);
        
        $car = new Ey_Carrito();
        
        $car->deleteItem($art_id);
        
        Ey::goBack();
    }

}