<?php

class Web_Admin_Pedidos_BuscarFecha extends Web_Admin_MainPage
{

    public function mainContent()
    {
        $this->add_css_link(BASE_WEB_ROOT . '/css/datepicker.css');
        $this->add_js_link(BASE_WEB_ROOT . '/js/datepicker.js');
        return $this->_getBuscar();
    }

    private function _getBuscar()
    {
        Ey::addConfig('activemenu', Ey::getPrm(1));

        $criterio = Ey::getPrm(3);
        $fecha = Ey::getPrm(4);
        
        $text = explode("-", $fecha);
        
        if (strlen($text[1]) == 1){
            $mes = 0 . $text[1];
        } else {
            $mes = $text[1];
        }
        
        if (strlen($text[2]) == 1){
            $dia = 0 . $text[2];
        } else {
            $dia = $text[2];
        }
        
        $fechaFinal = $text[0] . "-" . $mes . "-" . $dia;
        
        /*--------------------------------------------------------------------*/
        
        $criterio2 = Ey::getPrm(5);
        $fecha2 = Ey::getPrm(6);
        
        $text2 = explode("-", $fecha2);
        
        if (strlen($text2[1]) == 1){
            $mes = 0 . $text2[1];
        } else {
            $mes = $text2[1];
        }
        
        if (strlen($text2[2]) == 1){
            $dia = 0 . $text2[2];
        } else {
            $dia = $text2[2];
        }
        
        $fechaFinal2 = $text2[0] . "-" . $mes . "-" . $dia;
        
        /*--------------------------------------------------------------------*/

        $obj = new Web_Db_Carrito();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from(array('tb1' => 'gk_carrito'))
                ->join(array('tb2' => 'gk_clientes'), 'tb1.car_usu_id=tb2.cli_id', array('cli_nombre', 'cli_apellido', 'cli_empresa'))
                ->order('car_fecha_registro DESC');

        $select->where(" DATE(car_fecha_registro) BETWEEN '$fechaFinal' AND '$fechaFinal2' ");

        $pager = new Ey_Pager($select, WEB_ROOT . '/admin/pedidos/buscar-fecha/' . $criterio . '/' . $fecha . '/' . $criterio2 . '/' . $fecha2, Ey::getPrm(7), 50);
        $rows = $pager->fetchAll();
        $navegador = $pager->getNavigation();

//        echo $select;
//        echo '<pre>';
//        print_r($rows);
//        echo '</pre>';
//        exit;

        $user = array();

        foreach ($rows as $item) {
            $obj2 = new Web_Db_CarritoDetalle();
            $db2 = $obj2->getAdapter();
            $carrito = $db2->fetchAll($obj2->select()
                            ->from('gk_carrito_detalle', array('det_pro_cantidad'))
                            ->where('det_car_id=?', $item->car_id));

            $cantPro = null;
            foreach ($carrito as $value) {
                $cantPro+=$value->det_pro_cantidad;
            }

            if ($item->car_estado != 1) {
                $bgcolor = 'second';
                $estado = Ey::crearBoton(WEB_ROOT . '/admin/pedidos/svc/activar-estado/' . $item->car_id . '/1', 'Enviado', 'adm_btn_ok');
            } else {
                $bgcolor = 'first';
                $estado = Ey::crearBoton(WEB_ROOT . '/admin/pedidos/svc/activar-estado/' . $item->car_id . '/0', 'Pendiente', 'adm_btn_alert');
            }

            $detalle = '<a href="' . WEB_ROOT . '/admin/pedidos/detalle-pedido/' . $item->car_id . '" title="Detalle Pedido" >
                                    <img src="' . WEB_ROOT . '/img/admin/detail.png" alt="Detalle Pedido" /></a>';

            $user[] = array('id' => $item->car_id,
                            'name' => ucwords(strtolower($item->cli_apellido)) . ', ' . ucwords(strtolower($item->cli_nombre)),
                            'empresa' => ucwords(strtolower($item->cli_empresa)),
                            'fecha' => $item->car_fecha_registro,
                            'Cantidad' => $cantPro,
                            'estado' => $estado,
                            'detalle' => $detalle,
                            'bgcolor' => $bgcolor);
        }
        
//        print_r($user);

        $view = new Smarty_Engine();
        $date = explode('-', $fecha);
        $date2 = explode('-', $fecha2);
        $view->assign('fecha', Web_Admin_Pedidos_Wgt_Fecha::render($date[2], $date[1], $date[0]));
        $view->assign('fechaTo', Web_Admin_Pedidos_Wgt_FechaTo::render($date2[2], $date2[1], $date2[0]));
        $view->assign('usuarios', $user);
        $view->assign('total', $pager->recordCount());
        $view->assign('navegacion', $navegador);

        if (count($rows) <= 0) {
            $view->assign('footermsg', 'Aun no se han creado Pedidos');
        }

        return $view->fetch(ADMIN_PEDIDOS_DIR . DS . 'tpl' . DS . 'pedidos.tpl');
    }

}

