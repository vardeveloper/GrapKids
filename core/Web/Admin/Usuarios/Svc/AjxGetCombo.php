<?php

/* /svc/ajx-get-cat/table/id_padre/seleccionado */

class Web_Admin_Usuarios_Svc_AjxGetCombo
{
    
    public function doIt()
    {
        $tp = Ey::getPrm(4);

        $opt = Web_Admin_Usuarios_Wgt_AjaxCombo::getform($tp);

        header("Content-type: text/xml; charset=utf-8");

        echo $opt;
    }
    
}