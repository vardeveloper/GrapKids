<?php

class Web_Admin_Videos_Wgt_Videos {

    public function render() {
        return $this->lista();
    }

    private function lista() {
        Ey::addConfig('activemenu', Ey::getPrm(1));

        $obj = new Web_Db_Videos();
        $select = $obj->select()
                        ->order('vid_id desc');

        $pager = new Ey_Pager($select, BASE_WEB_ROOT . '/admin/videos/main', Ey::getPrm(3), 10);
        $rows = $pager->fetchAll();
        $navegador = $pager->getNavigation();

        $videos = array();

        foreach ($rows as $item) {
            if ($sw == 1) {
                $bgcolor = 'second';
                $sw = 0;
            } else {
                $bgcolor = 'first';
                $sw = 1;
            }

            if ($item->vid_estado != 1) {
                $bloquear = Ey::crearBoton(BASE_WEB_ROOT . '/admin/videos/svc/activar-video/' . $item->vid_id . '/1',
                                'Activar',
                                'adm_btn_ok');
            } else {
                $bloquear = Ey::crearBoton(BASE_WEB_ROOT . '/admin/videos/svc/activar-video/' . $item->vid_id . '/0',
                                'Bloquear',
                                'adm_btn_alert');
            }

            $modificar = Ey::crearBoton(BASE_WEB_ROOT . '/admin/videos/modificar-video/' . $item->vid_id,
                            'Modificar',
                            'adm_btn_ok');

            $eliminar = Ey::crearBoton(BASE_WEB_ROOT . '/admin/videos/svc/eliminar-video/' . $item->vid_id,
                            'Eliminar',
                            'adm_btn_alert adm_alert_delete');

            $row = array('id' => $item->vid_id,
                        'titulo' => $item->vid_titulo,
                        'link' => $item->vid_link,
                        'bloquear' => $bloquear,
                        'modificar' => $modificar,
                        'eliminar' => $eliminar,
                        'bgcolor' => $bgcolor);

            $videos[] = $row;
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('videos', $videos);
        $smarty->assign('total', $pager->recordCount());
        $smarty->assign('navegacion', $navegador);

        if (count($row) <= 0) {
            $smarty->assign('footermsg', 'Aun no existen videos');
        }

        return $smarty->fetch(ADMIN_VIDEOS_DIR . DS . 'tpl' . DS . 'videos.tpl');
    }

}

