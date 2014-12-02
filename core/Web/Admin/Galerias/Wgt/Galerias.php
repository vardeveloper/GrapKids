<?php

class Web_Admin_Galerias_Wgt_Galerias {

    public function render() {
        return $this->lista();
    }

    private function lista() {
        Ey::addConfig('activemenu', Ey::getPrm(1));

        $obj = new Web_Db_Galerias();

        $select = $obj->select()->order('gal_id desc');

        $pager = new Ey_Pager($select, BASE_WEB_ROOT . '/admin/galerias/main', Ey::getPrm(3), 10);

        $rows = $pager->fetchAll();

        $navegador = $pager->getNavigation();

        $galerias = array();

        foreach ($rows as $item) {
            if ($sw == 1) {
                $bgcolor = 'second';
                $sw = 0;
            } else {
                $bgcolor = 'first';
                $sw = 1;
            }

            if ($item->gal_estado != 1) {
                $bloquear = Ey::crearBoton(BASE_WEB_ROOT . '/admin/galerias/svc/activar-galeria/' . $item->gal_id . '/1',
                                'Activar',
                                'adm_btn_ok');
            } else {
                $bloquear = Ey::crearBoton(BASE_WEB_ROOT . '/admin/galerias/svc/activar-galeria/' . $item->gal_id . '/0',
                                'Bloquear',
                                'adm_btn_alert');
            }

            $modificar = Ey::crearBoton(BASE_WEB_ROOT . '/admin/galerias/modificar-galeria/' . $item->gal_id,
                            'Modificar',
                            'adm_btn_ok');

            $eliminar = Ey::crearBoton(BASE_WEB_ROOT . '/admin/galerias/svc/eliminar-galeria/' . $item->gal_id,
                            'Eliminar',
                            'adm_btn_alert adm_alert_delete');

            $fotos = Ey::crearBoton(BASE_WEB_ROOT . '/admin/galerias/fotos/' . $item->gal_id,
                            'Ver Fotos',
                            'adm_btn_ok');

            $nuevafoto = Ey::crearBoton(BASE_WEB_ROOT . '/admin/galerias/nueva-foto/' . $item->gal_id,
                            'Agregar Foto',
                            'adm_btn_ok');

            $row = array('titulo' => $item->gal_titulo,
                        'fecha' => $item->gal_fecha,
                        'imagen' => BASE_WEB_ROOT . '/svc/get-img/galerias-gal_' . $item->gal_id . '/150:113',
                        'fotos' => $fotos,
                        'nuevafoto' => $nuevafoto,
                        'bloquear' => $bloquear,
                        'modificar' => $modificar,
                        'eliminar' => $eliminar,
                        'bgcolor' => $bgcolor);

            $galerias[] = $row;
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('galerias', $galerias);
        $smarty->assign('total', $pager->recordCount());
        $smarty->assign('navegacion', $navegador);

        if (count($row) <= 0) {
            $smarty->assign('footermsg', 'Aun no existe Galerias');
        }

        return $smarty->fetch(ADMIN_GALERIAS_DIR . DS . 'tpl' . DS . 'galerias.tpl');
    }

}

