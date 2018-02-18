<?php

class Web_Admin_Svc_Eliminar
{
    public function doIt()
    {
        global $db;
    
	$db->delete('evt_'.Ey::getPrm(3),Ey::getPrm(4).'_id='.Ey::getPrm(5));
		
        Ey::goBack();
    }
}