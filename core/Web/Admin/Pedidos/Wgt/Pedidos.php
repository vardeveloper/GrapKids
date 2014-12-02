<?php

class Web_Admin_Pedidos_Wgt_Pedidos
{

    public function __construct($context)
    {
        $context->add_css_link(BASE_WEB_ROOT . '/css/datepicker.css');
        $context->add_js_link(BASE_WEB_ROOT . '/js/datepicker.js');
    }

    public function render()
    {
        return $this->_getUsuarios();
    }

    private function _getUsuarios()
    {
        Ey::addConfig('activemenu', Ey::getPrm(1));

        $usu_id = Ey::getPrm(3);

        $obj = new Web_Db_Carrito();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from(array('tb1' => 'gk_carrito'))
                ->join(array('tb2' => 'gk_clientes'), 'tb1.car_usu_id=tb2.cli_id', array('cli_nombre', 'cli_apellido', 'cli_empresa'))
                ->where('cli_estado=?', 1)
                ->order('car_id desc');

        if ($usu_id) {
            $select->where('car_usu_id=?', $usu_id);
            $pager = new Ey_Pager($select, WEB_ROOT . '/admin/pedidos/main/' . $usu_id, Ey::getPrm(4), 50);
        } else {
            $pager = new Ey_Pager($select, WEB_ROOT . '/admin/pedidos/main/0', Ey::getPrm(4), 50);
        }

        $rows = $pager->fetchAll();
        $navegador = $pager->getNavigation();

        if (!is_null($rows)) {

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

                if ($item->car_estado != 1) {
                    $bgcolor = 'second';
                    $estado = Ey::crearBoton(WEB_ROOT . '/admin/pedidos/svc/activar-estado/'. $item->car_id . '/1', 'Enviado', 'adm_btn_ok');
                } else {
                    $bgcolor = 'first';
                    $estado = Ey::crearBoton(WEB_ROOT . '/admin/pedidos/svc/activar-estado/'. $item->car_id . '/0', 'Pendiente', 'adm_btn_alert');
                }
                
                $detalle = '<a href="' . WEB_ROOT . '/admin/pedidos/detalle-pedido/' . $item->car_id . '" title="Detalle Pedido" >
                                    <img src="' . WEB_ROOT . '/img/admin/detail.png" alt="Detalle Pedido" /></a>';
                                    
                $empresa = $item->cli_empresa ? ucwords(strtolower($item->cli_empresa)) : null;

                $user[] = array('id' => $item->car_id,
                                'name' => ucwords(strtolower($item->cli_apellido)) . ', ' . ucwords(strtolower($item->cli_nombre)),
                                'rsEmpresa' => $empresa,
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
            $smarty->assign('fechaTo', Web_Admin_Pedidos_Wgt_FechaTo::render());
            $smarty->assign('total', $pager->recordCount());

            if (count($rows) <= 0) {
                $smarty->assign('footermsg', 'Aun no se han creado Pedidos');
            }

            return $smarty->fetch(ADMIN_PEDIDOS_DIR . DS . 'tpl' . DS . 'pedidos.tpl');
        }
    }

}