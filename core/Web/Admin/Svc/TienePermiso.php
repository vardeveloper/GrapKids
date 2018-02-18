<?php

class Web_Admin_Svc_TienePermiso
{
    public function doIt()
    {
        $this->tiene();
    }

    public function tiene($modulo)
    {
        $permisos=$_SESSION['permisos'][$modulo];
	foreach($permisos as $p)
	{
            $permiso=$p['am_per_id'];
	}

        if($permiso==2)
	{
            $_SESSION['alert']='<script type="text/javascript">'."alert('No tienes permisos para realizar esta accion');</script>";
            Ey::goBack();
	}
    }
}