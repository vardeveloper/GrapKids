<?php

class Web_Admin_Monedas_Wgt_Monedas {

    public function render() {
        return $this->_getMonedas();
    }

    public function _getMonedas() {
        global $db;

        $smarty = new Smarty_Engine();

        if (isset($_SESSION['error'])) {
            $smarty->assign('error', $_SESSION['error']);
            $smarty->assign('post', $_SESSION['post']);
            unset($_SESSION['error']);
            unset($_SESSION['post']);
        }

        if (isset($_SESSION['correcto'])) {
            $smarty->assign('correcto', $_SESSION['correcto']);
            unset($_SESSION['correcto']);
        }

        Ey::addConfig('activemenu', Ey::getPrm(1));

        $select = $db->select()->from('gk_moneda');

        //$pager=new Ey_Pager($select,BASE_WEB_ROOT.'/admin/monedas',Ey::getPrm(3),10);
        //$productos=$pager->query();
        //$navegador=$pager->getNavigation();

        $monedas = $db->fetchAll($select);

        foreach ($monedas as $moneda) {
            if ($sw == 1) {
                $bgcolor = 'second';
                $sw = 0;
            } else {
                $bgcolor = 'first';
                $sw = 1;
            }

            $menu = new Container();
            $menu->add(Atag::factory(BASE_WEB_ROOT . '/admin/monedas/svc/delete-moneda/' . $moneda->mon_id, 'Eliminar', 'adm_btn_alert adm_alert_delete'));
            $moneda->menu = $menu->render();

            $moneda->gbcolor = $bgcolor;
            $moneda->mon_valor = round(1 / $moneda->mon_valor, 2);
        }

        $smarty->assign('monedas', $monedas);
        $smarty->assign('navegacion', $navegador);

        if (count($monedas) <= 0) {
            $smarty->assign('footermsg', 'Aun no se han creado monedas');
        }

        return $smarty->fetch(ADMIN_MONEDAS_DIR . DS . 'tpl' . DS . 'monedas.tpl');
    }

}

