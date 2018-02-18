<?php

class Web_Admin_Svc_CambiarEstado
{
    public function doIt()
    {
        global $db;
		
	$obj=new Web_Admin_Svc_TienePermiso();
		
        $obj->tiene(Ey::getPrm(7));
		
        if(Ey::getPrm(4)=='1')
      
            $db->update('evt_'.Ey::getPrm(5),array(Ey::getPrm(6).'_estado'=>'0'),Ey::getPrm(6).'_id='.Ey::getPrm(3));
    
        elseif(Ey::getPrm(4)=='0')
      
            $db->update('evt_'.Ey::getPrm(5),array(Ey::getPrm(6).'_estado'=>'1'),Ey::getPrm(6).'_id='.Ey::getPrm(3));
    
        Ey::goBack();
    }
}