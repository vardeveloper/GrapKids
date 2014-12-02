<?php

class Web_Admin_Galerias_Svc_EliminarGaleria {

    public function doIt() {
        $this->eliminar();
    }

    private function eliminar() {
        $gal_id = Ey::getPrm(4);

        $obj = new Web_Db_Galerias();

        $obj->delete('gal_id=' . $gal_id);

        @unlink(DATA_DIR . DS . 'img' . DS . 'galerias' . DS . 'gal_' . $gal_id . '.jpg');
        
        /**
         * Eliminar todas las fotos de la galeria
         */
        
        $obj2 = new Web_Db_Fotos();
        $Fotos = $obj2->fetchAll($obj2->select()
//                                ->from('gk_fotos')
                                ->where('fot_gal_id=?', $gal_id));
        foreach ($Fotos as $value) {
            $obj2->delete('fot_id=' . $value->fot_id);
            @unlink(DATA_DIR . DS . 'img' . DS . 'fotos' . DS . 'fot_' . $value->fot_id . '.jpg');
        }

        Ey::redirect(BASE_WEB_ROOT . '/admin/galerias');
    }

}