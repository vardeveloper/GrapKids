<?php

class Web_Admin_Galerias_ModificarGaleria extends Web_Admin_MainPage {

    public function mainContent() {
        return $this->actualizar();
    }

    private function actualizar() {
        $error = '';

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }

        $gal_id = Ey::getPrm(3);

        $obj = new Web_Db_Galerias();

        $rs = $obj->fetchRow($obj->select()
                                ->where('gal_id=?', $gal_id));

        $imagen = BASE_WEB_ROOT . '/svc/get-img/galerias-gal_' . $rs->gal_id . '/150:113';

        $smarty = new Smarty_Engine();
        $smarty->assign('error', $error);
        $smarty->assign('galeria', $rs);
        $smarty->assign('imagen',$imagen);

        return $smarty->fetch(ADMIN_GALERIAS_DIR . DS . 'tpl' . DS . 'modificar-galeria.tpl');
    }

}