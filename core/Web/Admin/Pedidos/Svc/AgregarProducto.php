<?php

class Web_Admin_Pedidos_Svc_AgregarProducto
{

    public function doIt()
    {
        $this->agregaArticulo();
    }

    private function agregaArticulo()
    {
        $id = $_POST['idPro'];
        
        $precio = $_POST['precio'];

        $cantidad = $_POST['cantidad'];

        $cart = new Ey_Carrito();

        $cart->addItem($id, $cantidad, $precio);

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}

