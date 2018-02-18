<?php

class Web_Admin_Pedidos_Svc_ActualizarPedido
{

    public function doIt()
    {
        $this->actualizarPedido();
    }

    private function actualizarPedido()
    {
        $ped_id = Ey::getPrm(4);

        $obj = new Web_Db_CarritoDetalle();
        
        $db = $obj->getAdapter();
        
        $rsProductos = $db->fetchAll($obj->select()
                                        ->from('gk_carrito_detalle', array('det_pro_id'))
                                        ->where('det_car_id=?', $ped_id));

        foreach ($rsProductos as $value) {
            if ($_POST['precio_' . $value->det_pro_id] == '') {
                $_POST['precio_' . $value->det_pro_id] = null;
            }
            if ($_POST['descuento_' . $value->det_pro_id] == '') {
                $_POST['descuento_' . $value->det_pro_id] = null;
            }
            
            $row = array('det_pro_precio' => $_POST['precio_' . $value->det_pro_id],
                         'det_pro_descuento' => $_POST['descuento_' . $value->det_pro_id]);
            
            $obj->update($row, 'det_pro_id=' . $value->det_pro_id);
        }

        Ey::redirect(WEB_ROOT . "/admin/pedidos/detalle-pedido/" . $ped_id);
    }

}