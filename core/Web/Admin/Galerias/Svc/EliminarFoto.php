<?php

class Web_Admin_Galerias_Svc_EliminarFoto {

    public function doIt() {
        $this->eliminar();
    }

    private function eliminar() {
        $fot_id = Ey::getPrm(4);

        $gal_id = Ey::getPrm(5);

        $obj = new Web_Db_Fotos();

        $obj->delete('fot_id=' . $fot_id);

        @unlink(DATA_DIR . DS . 'img' . DS . 'fotos' . DS . 'fot_' . $fot_id . '.jpg');

        Ey::redirect(BASE_WEB_ROOT . '/admin/galerias/fotos/' . $gal_id);
    }

}