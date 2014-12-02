<?php

class Web_Admin_Clientes_Svc_ActivarCliente
{

    public function doIt()
    {
        $this->activarUsuario();
    }

    private function activarUsuario()
    {
        $cli_id = Ey::getPrm(4);
        
        $opc = Ey::getPrm(5);
        
        $obj = new Web_Db_Clientes();
        
        if ($opc == 1) {
            $row = array('cli_estado' => '1');
        } else {
            $row = array('cli_estado' => '0');
        }
        
        $obj->update($row, 'cli_id=' . $cli_id);

        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}