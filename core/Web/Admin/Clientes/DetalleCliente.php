<?php

class Web_Admin_Clientes_DetalleCliente extends Web_Admin_MainPage
{

    public function mainContent()
    {
        return $this->detalle();
    }

    private function detalle()
    {
        $cli_id = Ey::getPrm(3);
        
        $obj = new Web_Db_Clientes();
        $db = $obj->getAdapter();
        $rs = $db->fetchRow($obj->select()->where('cli_id=?', $cli_id));
//        print_r($rs);
        
        $smarty = new Smarty_Engine();
        $smarty->assign('cliente', $rs);
        
        return $smarty->fetch(ADMIN_CLIENTES_DIR . DS . 'tpl' . DS . 'detalle-cliente.tpl');
    }

}