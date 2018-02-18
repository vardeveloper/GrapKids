<?php

class Web_Admin_Delivery_Wgt_Delivery {

//    public function __construct($context) {
//        $context->add_css_link(BASE_WEB_ROOT . '/css/navega.css');
//        $context->add_js_link(BASE_WEB_ROOT . '/js/jquery.js');
//    }

    public function render() {
        return $this->_getUsuarios();
    }

    private function _getUsuarios() {
        global $db;
        $select = $db->select()->from('gk_moneda', array('mon_valor'))->where('mon_key="dolar"');
        $moneda = $db->fetchRow($select);
//        print_r($monedas);

        Ey::addConfig('activemenu', Ey::getPrm(1));

        $obj = new Web_Db_Delivery();
        $db = $obj->getAdapter();
        $select = $db->select()->from('gk_delivery');

        $pager = new Ey_Pager($select, WEB_ROOT . '/admin/delivery/main', Ey::getPrm(3), 20);
        $rows = $pager->fetchAll();
        $navegador = $pager->getNavigation();

        foreach ($rows as $item) {

            if ($sw == 1) {
                $bgcolor = 'second';
                $sw = 0;
            } else {
                $bgcolor = 'first';
                $sw = 1;
            }

            if ($item->del_estado != 1) {
                $bloquear = '<a href="' . WEB_ROOT . '/admin/delivery/svc/activar-delivery/' . $item->del_id . '/1" title="Inactivo" >
                                        <img src="' . WEB_ROOT . '/img/admin/inactive.png" alt="Inactivo" /></a>';
            } else {
                $bloquear = '<a href="' . WEB_ROOT . '/admin/delivery/svc/activar-delivery/' . $item->del_id . '/0" title="Activo" >
                                        <img src="' . WEB_ROOT . '/img/admin/active.png" alt="Activo" /></a>';
            }

            $eliminar = '<a href="' . WEB_ROOT . '/admin/delivery/svc/delete-delivery/' . $item->del_id . '" title="Eliminar" class="adm_alert_delete" >
                                    <img src="' . WEB_ROOT . '/img/admin/delete.png" alt="Eliminar" /></a>';

            $editar = '<a href="' . WEB_ROOT . '/admin/delivery/modificar-delivery/' . $item->del_id . '" title="Editar" >
                                    <img src="' . WEB_ROOT . '/img/admin/edit.png" width="16" height="16" alt="Editar" /></a>';

            $row = array('id' => $item->del_id,
                        'distrito' => $item->del_distrito,
                        'codigo' => $item->del_codigo,
                        'precio' => $item->del_precio,
                        'precio2' => round($item->del_precio * $moneda->mon_valor, 2),
                        'bloquear' => $bloquear,
                        'editar' => $editar,
                        'eliminar' => $eliminar,
                        'bgcolor' => $bgcolor);

            $user[] = $row;
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('usuarios', $user);
        $smarty->assign('navegacion', $navegador);
        $smarty->assign('total', $pager->recordCount());

        if (count($rows) <= 0) {
            $smarty->assign('footermsg', 'Aun no se han creado Registros');
        }

        return $smarty->fetch(ADMIN_DELIVERY_DIR . DS . 'tpl' . DS . 'delivery.tpl');
    }

}

