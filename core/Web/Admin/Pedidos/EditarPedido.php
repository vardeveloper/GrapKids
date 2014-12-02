<?php

class Web_Admin_Pedidos_EditarPedido extends Web_Admin_MainPage
{

    public function mainContent()
    {
        return $this->_editar();
    }

    private function _editar()
    {
        $car_id = Ey::getPrm(3);
        $obj = new Web_Db_CarritoDetalle();
        $db = $obj->getAdapter();
        $carrito = $db->fetchAll($obj->select()
                                ->where('det_car_id=?', $car_id));

        $regresar = Ey::crearBoton(WEB_ROOT . '/admin/pedidos/detalle-pedido/' . $car_id, 'Regresar', 'adm_btn_ok bld');

        foreach ($carrito as $value) {
            $productos[] = array('id' => $value->det_pro_id,
                                'nombre' => $value->det_pro_nombre,
                                'cantidad' => $value->det_pro_cantidad,
                                'descuento' => $value->det_pro_descuento,
                                'precio' => $value->det_pro_precio);
        }

        $obj3 = new Web_Db_Carrito();
        $db3 = $obj3->getAdapter();
        $caritoDato = $db3->fetchRow($obj3->select()
                                ->where('car_id=?', $car_id));
        
        if ($caritoDato->car_estado == 1) {
            $html = 'Pendiente';
        } else {
            $html = 'Enviado';
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('html', $html);
        $smarty->assign('regresar', $regresar);
        $smarty->assign('productos', $productos);
        $smarty->assign('caritoDato', $caritoDato);

        return $smarty->fetch(ADMIN_PEDIDOS_DIR . DS . 'tpl' . DS . 'editar-pedido.tpl');
    }

}