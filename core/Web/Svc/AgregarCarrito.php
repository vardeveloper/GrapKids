<?php

class Web_Svc_AgregarCarrito
{

    public function doIt()
    {
        $this->agregaArticulo();
    }

    private function agregaArticulo()
    {
        $art_id = Ey::getPrm(2);
        
        $precio = Ey::getPrm(3);
        
        $cart = new Ey_Carrito();
        
        $cart->addItem($art_id, 1, $precio);
        
        Ey::redirect(WEB_ROOT . "/mi-carrito");
    }

}

