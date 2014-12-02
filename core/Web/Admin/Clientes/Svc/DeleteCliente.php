<?php

class Web_Admin_Clientes_Svc_DeleteCliente
{

    public function doIt()
    {
        $this->eliminar();
    }

    private function eliminar()
    {
        $cli_id = Ey::getPrm(4);
        
        $obj = new Web_Db_Clientes();
        
        $row = array('cli_estado' => '2');
        
        $obj->update($row, 'cli_id=' . $cli_id);
        
        Ey::redirect($_SERVER['HTTP_REFERER']);
    }

}