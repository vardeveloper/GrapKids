<?php

class Web_Admin_Pedidos_Busqueda extends Web_Admin_MainPage
{

    public function mainContent()
    {
        parent::add_css_link(BASE_WEB_ROOT . '/css/datepicker.css');
        parent::add_js_link(BASE_WEB_ROOT . '/js/datepicker.js');
        return $this->_getBuscar();
    }

    private function _getBuscar()
    {
        $criterio = urldecode(Ey::getPrm(3));
        $text = explode(':', $criterio);

        $obj = new Web_Db_Carrito();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from(array('tb1' => 'gk_carrito'))
                ->joinInner(array('tb2' => 'gk_clientes'), 'tb1.car_usu_id=tb2.cli_id', array('cli_nombre', 'cli_apellido', 'cli_empresa'))
                ->where('car_id =?', $text[1]);

        $pager = new Ey_Pager($select, WEB_ROOT . '/admin/pedidos/busqueda', Ey::getPrm(3), 50);
        $rows = $pager->query();
        $navegador = $pager->getNavigation();
        $numeroReg = $pager->recordCount();

        foreach ($rows as $item) {
            $obj2 = new Web_Db_CarritoDetalle();
            $db2 = $obj2->getAdapter();
            $carrito = $db2->fetchAll($obj2->select()
                                    ->from('gk_carrito_detalle', array('det_pro_cantidad'))
                                    ->where('det_car_id=?', $item->car_id));

            $Cantidad = '';
            foreach ($carrito as $value) {
                $Cantidad+=$value->det_pro_cantidad;
            }

            $detalle = '<a href="' . WEB_ROOT . '/admin/pedidos/detalle-pedido/' . $item->car_id . '" title="Detalle Pedido" >
                                    <img src="' . WEB_ROOT . '/img/admin/detail.png" alt="Detalle Pedido" /></a>';

            if ($item->car_estado != 1) {
                $bgcolor = 'second';
                $estado = Ey::crearBoton(WEB_ROOT . '/admin/pedidos/svc/activar-estado/' . $item->car_id . '/1', 'Enviado', 'adm_btn_ok');
            } else {
                $bgcolor = 'first';
                $estado = Ey::crearBoton(WEB_ROOT . '/admin/pedidos/svc/activar-estado/' . $item->car_id . '/0', 'Pendiente', 'adm_btn_alert');
            }

            $user[] = array('id' => $item->car_id,
                            'name' => ucwords(strtolower($item->cli_apellido)) . ', ' . ucwords(strtolower($item->cli_nombre)),
                            'empresa' => ucwords(strtolower($item->cli_empresa)),
                            'fecha' => $item->car_fecha_registro,
                            'Cantidad' => $Cantidad,
                            'estado' => $estado,
                            'detalle' => $detalle,
                            'bgcolor' => $bgcolor);
        }
        
        $smarty = new Smarty_Engine();
        $smarty->assign('usuarios', $user);
        $smarty->assign('navegacion', $navegador);
        $smarty->assign('fecha', Web_Admin_Pedidos_Wgt_Fecha::render());
        $smarty->assign('titulo', $numeroReg . ' Registro encontrado con el Nº de Pedido "' . $text[1] . '"');

        if (count($rows) <= 0) {
            $smarty->assign('footermsg', 'La busqueda no obtuvo resultados');
        }

        return $smarty->fetch(ADMIN_PEDIDOS_DIR . DS . 'tpl' . DS . 'pedidos.tpl');
    }

}