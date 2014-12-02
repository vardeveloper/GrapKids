<?php

class Web_Admin_Svc_DoLogin
{

    public function doIt()
    {
        $obj=new Web_Db_Admin();
		
        Ey_Login::doLogin('adm_user',
                          'adm_pass',
                          $obj,
                          array('user'=>'Ingrese su nombre de usuario',
                                'pass'=>'Ingrese su password'),
                          'adm');
    }
}