<?php

class Web_Admin_Pedidos_Svc_BuscarCliente
{

    public function doIt()
    {
        $criterio = strtolower($_GET["term"]);

        if (!$criterio)
            return;

        $obj = new Web_Db_Clientes();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from('gk_clientes', array('cli_id', 'cli_nombre', 'cli_apellido', 'cli_email'))
                ->where('cli_estado =?', 1)
                ->where('cli_nombre LIKE ?', '%' . $criterio . '%')
                ->orWhere('cli_apellido LIKE ?', '%' . $criterio . '%')
                ->order(array('cli_nombre', 'cli_apellido'))
                ->limit(10);

        $clientes = $db->fetchAll($select);

        foreach ($clientes as $item) {
            $resultado[] = array("label" => $item->cli_nombre . ' ' .$item->cli_apellido,
                "value" => array("nombre" => $item->cli_nombre . ' ' .$item->cli_apellido,
                                "email" => $item->cli_email,
                                "id" => $item->cli_id));
        }

        echo json_encode($resultado);
    }

}