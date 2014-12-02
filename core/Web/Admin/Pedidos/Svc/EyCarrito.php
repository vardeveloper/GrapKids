<?php

class Web_Admin_Pedidos_Svc_EyCarrito
{

    public function __construct()
    {
        if (!isset($_SESSION['eyoriacart'])) {
            $_SESSION['eyoriacart'] = array();
        }
    }

    public function addItem($item_id, $unidad, $descripcion, $cantidad, $item_price)
    {
        if (!isset($_SESSION['eyoriacart'])) {
            $_SESSION['eyoriacart'] = array();
        }

        $_SESSION['eyoriacart'][$item_id] = array('item_id' => $item_id,
            'unidad' => $unidad,
            'descripcion' => $descripcion,
            'cantidad' => $cantidad,
            'item_price' => $item_price);
    }

    public function updateItem($item_id, $cantidad/* , $item_price */)
    {
        if (array_key_exists($item_id, $_SESSION['eyoriacart'])) {
            $_SESSION['eyoriacart'][$item_id]['cantidad'] = $cantidad;
//            $_SESSION['eyoriacart'][$item_id]['item_price'] = $item_price;
        }
    }

    public function itemsCount()
    {
        $counter = 0;
        if (isset($_SESSION['eyoriacart'])) {
            $shop = $_SESSION['eyoriacart'];
            foreach ($shop as $item) {
                $counter+=$item['cantidad'];
            }
        }
        return $counter;
    }

    public function getCart()
    {
        return $_SESSION['eyoriacart'];
    }

    public function deleteItem($item_id)
    {
        unset($_SESSION['eyoriacart'][$item_id]);
    }

}

