<?php

class Web_Admin_Pedidos_DetallePedido extends Web_Admin_MainPage
{

    public function mainContent()
    {
        return $this->_detalle();
    }

    private function _detalle()
    {
        $car_id = Ey::getPrm(3);
        
        $_SESSION['car_id'] = $car_id;
        
        $obj = new Web_Db_CarritoDetalle();
        
        $db = $obj->getAdapter();
        
        $carrito = $db->fetchAll($obj->select()
                                ->where('det_car_id=?', $car_id));
        
//        print_r($carrito);
        
        foreach ($carrito as $value) {
            $link = '<a class="deta" href="' . WEB_ROOT . '/admin/productos/detalle-producto/' . $value->det_pro_id . '">' . $value->det_pro_nombre . '</a>';
            $precio = ($value->det_pro_precio-(($value->det_pro_precio * $value->det_pro_descuento)/100));
            $subtotal = $precio * $value->det_pro_cantidad;
            $total+=$subtotal;
            
            $productos[] = array('id' => $value->det_pro_id,
                            'nombre' => $link,
                            'cantidad' => $value->det_pro_cantidad,
                            'descuento' => $value->det_pro_descuento,
                            'precio' => number_format($value->det_pro_precio, 2, '.', ','),
                            'subtotal' => number_format($subtotal, 2, '.', ','));
        }
        
        $total = number_format($total, 2, '.', ',');
        

        $obj3 = new Web_Db_Carrito();
        
        $db3 = $obj3->getAdapter();
        
        $caritoDato = $db3->fetchRow($obj3->select()
                                ->where('car_id=?', $car_id));
        
//        print_r($caritoDato);

        if ($caritoDato->car_estado == 1) {
            $html = 'Pendiente';
//            $editar = Ey::crearBoton(WEB_ROOT . '/admin/pedidos/editar-pedido/' . $car_id, 'Editar', 'adm_btn_ok bld');
            $editar = '<a class="adm_btn span adm_btn2" href="' . WEB_ROOT . '/admin/pedidos/editar-pedido/' . $car_id . '">Modificar</a>';
        } else {
            $html = 'Enviado';
            $editar = '';
        }

        $obj4 = new Web_Db_Clientes();
        
        $db4 = $obj4->getAdapter();
        
        $cliente = $db4->fetchRow($obj4->select()
                                ->from('gk_clientes', array('cli_nombre', 'cli_apellido', 'cli_pais', 'cli_provincia', 'cli_distrito', 'cli_direccion', 'cli_email', 'cli_telefono', 'cli_celular', 'cli_empresa', 'cli_ruc', 'cli_cargo'))
                                ->where('cli_id=?', $caritoDato->car_usu_id));
        
//        print_r($cliente);

        $smarty = new Smarty_Engine();
        $smarty->assign('editar', $editar);
        $smarty->assign('html', $html);
        $smarty->assign('total', $total);
        $smarty->assign('productos', $productos);
        $smarty->assign('caritoDato', $caritoDato);
        $smarty->assign('cliente', $cliente);

        return $smarty->fetch(ADMIN_PEDIDOS_DIR . DS . 'tpl' . DS . 'detalle-pedido.tpl');
    }

}