<?php

class Web_Svc_Filtrar
{

    public function doIt()
    {
        $_SESSION['filtrar'] = array('orden' => $_POST['orden'], 'seccion' => $_POST['seccion']);
        Ey::goBack();
    }

}