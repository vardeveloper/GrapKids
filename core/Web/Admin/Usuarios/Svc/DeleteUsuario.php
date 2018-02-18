<?php

class Web_Admin_Usuarios_Svc_DeleteUsuario
{

    public function doIt()
    {
        $this->eliminar();
    }

    private function eliminar()
    {
        $adm_id = Ey::getPrm(4);
        
        $obj2 = new Web_Db_Privilegios();
        $db = $obj2->getAdapter();
        $rs = $db->fetchAll($obj2->select()->where('mod_id_admin=?', $adm_id));
        
        foreach ($rs as $value) {
             $obj2->delete('mod_id_admin=' . $adm_id);
        }

        $obj = new Web_Db_Admin();

        $obj->delete('adm_id=' . $adm_id);

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}