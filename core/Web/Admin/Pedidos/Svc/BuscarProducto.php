<?php

class Web_Admin_Pedidos_Svc_BuscarProducto
{

    public function doIt()
    {
        $criterio = strtolower($_GET["term"]);

        if (!$criterio)
            return;

        $obj = new Web_Db_Productos();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from('gk_productos', array('pro_id', 'pro_nombre', 'pro_precio'))
                ->where('pro_estado =?', 1)
                ->where('pro_nombre LIKE ?', '%' . $criterio . '%')
                ->limit(10);

        $productos = $db->fetchAll($select);

        foreach ($productos as $item) {
            $resultado[] = array("label" => $item->pro_nombre,
                "value" => array("descripcion" => $item->pro_nombre,
                    "precio" => $item->pro_precio,
                    "id" => $item->pro_id));
        }

        echo json_encode($resultado);
    }

}