<?php

class Web_Admin_Galerias_ModificarFoto extends Web_Admin_MainPage {

    public function mainContent() {
        return $this->actualizar();
    }

    private function actualizar() {
        $error = '';

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }

        $fot_id = Ey::getPrm(3);

        $obj = new Web_Db_Fotos();

        $rs = $obj->fetchRow($obj->select()
                                ->where('fot_id=?', $fot_id));

        $imagen = BASE_WEB_ROOT . '/svc/get-img/fotos-fot_' . $rs->fot_id . '/150:113';

        $smarty = new Smarty_Engine();
        $smarty->assign('error', $error);
        $smarty->assign('foto', $rs);
        $smarty->assign('imagen',$imagen);

        return $smarty->fetch(ADMIN_GALERIAS_DIR . DS . 'tpl' . DS . 'modificar-foto.tpl');
    }

}