<?php

class Web_Admin_Banner_Wgt_Banner
{

    public function render()
    {
        return $this->lista();
    }

    private function lista()
    {
        Ey::addConfig('activemenu', Ey::getPrm(1));

        $obj = new Web_Db_Banner();
        $select = $obj->select()->order('ba_id desc');

        $pager = new Ey_Pager($select, BASE_WEB_ROOT . '/admin/banner/main', Ey::getPrm(3), 15);
        $rows = $pager->fetchAll();
        $navegador = $pager->getNavigation();
        
//        print_r($rows);

        $banner = array();

        foreach ($rows as $item) {
            if ($sw == 1) {
                $bgcolor = 'second';
                $sw = 0;
            } else {
                $bgcolor = 'first';
                $sw = 1;
            }

            if ($item->ba_estado != 1) {
                $bloquear = Ey::crearBoton(BASE_WEB_ROOT . '/admin/banner/svc/activar-banner/' . $item->ba_id . '/1', 'Activar', 'adm_btn_ok');
            } else {
                $bloquear = Ey::crearBoton(BASE_WEB_ROOT . '/admin/banner/svc/activar-banner/' . $item->ba_id . '/0', 'Bloquear', 'adm_btn_alert');
            }

            $modificar = Ey::crearBoton(BASE_WEB_ROOT . '/admin/banner/modificar-banner/' . $item->ba_id, 'Modificar', 'adm_btn_ok');

            $eliminar = Ey::crearBoton(BASE_WEB_ROOT . '/admin/banner/svc/eliminar-banner/' . $item->ba_id, 'Eliminar', 'adm_btn_alert adm_alert_delete');

            $banner[] = array('id' => $item->ba_id,
                'titulo' => $item->ba_titulo,
                'bloquear' => $bloquear,
                'modificar' => $modificar,
                'eliminar' => $eliminar,
                'bgcolor' => $bgcolor);
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('banner', $banner);
        $smarty->assign('total', $pager->recordCount());
        $smarty->assign('navegacion', $navegador);

        if (count($rows) <= 0) {
            $smarty->assign('footermsg', 'Aun no existen banner para la portada');
        }

        return $smarty->fetch(ADMIN_BANNER_DIR . DS . 'tpl' . DS . 'banner.tpl');
    }

}

