<?php

class Web_Admin_Galerias_Fotos extends Web_Admin_MainPage {

    public function mainContent() {
        parent::add_js_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.js');
        parent::add_css_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.css');
        return $this->lista();
    }

    private function lista() {

        Ey::addConfig('activemenu', Ey::getPrm(1));

        $gal_id = Ey::getPrm(3);

        $obj = new Web_Db_Fotos();

        $db = $obj->getAdapter();

        $select = $db->select()
                        ->from(array('tb1' => 'gk_fotos'),
                                array('fot_id', 'fot_gal_id', 'fot_fecha', 'fot_titulo'))
                        ->joinInner(array('tb2'=>'gk_galerias'),
                                     'tb1.fot_gal_id=tb2.gal_id',
                                     array('gal_titulo'))
                        ->where('fot_gal_id=?', $gal_id)
                        ->order('fot_id desc');

        $pager = new Ey_Pager($select, BASE_WEB_ROOT . '/admin/galerias/fotos/' . $gal_id, Ey::getPrm(4), 10);

        $rows = $pager->fetchAll();

        $navegador = $pager->getNavigation();

        if (!is_null($rows)) {

            $fotos = array();

            foreach ($rows as $row) {

                if ($sw == 1) {
                    $bgcolor = 'second';
                    $sw = 0;
                } else {
                    $bgcolor = 'first';
                    $sw = 1;
                }

                $modificar = Ey::crearBoton(WEB_ROOT . '/admin/galerias/modificar-foto/' . $row->fot_id,
                                'Modificar',
                                'adm_btn_ok');

                $eliminar = Ey::crearBoton(WEB_ROOT . '/admin/galerias/svc/eliminar-foto/' . $row->fot_id . '/' . $gal_id,
                                'Eliminar',
                                'adm_btn_alert adm_alert_delete');

//                $nuevafoto = Ey::crearBoton(WEB_ROOT . '/admin/galerias/nueva-foto/' . $gal_id,
//                                'Nueva Foto',
//                                'adm_btn_ok');

                $lista = array( 'titulo' => $row->fot_titulo,
                                'imagen' => BASE_WEB_ROOT . '/svc/get-img/fotos-fot_' . $row->fot_id . '/150:113',
                                'galeria' => $row->gal_titulo,
//                                'nuevafoto' => $nuevafoto,
                                'modificar' => $modificar,
                                'eliminar' => $eliminar,
                                'bgcolor' => $bgcolor);

                $fotos[] = $lista;
            }

            $smarty = new Smarty_Engine();
            $smarty->assign('navigator', $navegador);
            $smarty->assign('fotos', $fotos);
            $smarty->assign('gal_id', $gal_id);
            $smarty->assign('total', $pager->recordCount());

            if (count($rows) <= 0) {
                $smarty->assign('footermsg', 'Aun no se han creado fotos de esta Galeria');
            }

            return $smarty->fetch(ADMIN_GALERIAS_DIR . DS . 'tpl' . DS . 'fotos.tpl');
        }
    }

}