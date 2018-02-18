<?php

class Web_Admin_Svc_loOff
{
    public function doIt()
    {
        $this->loOff();
    }

    public function loOff()
    {
        unset($_SESSION['adm']);
        Ey::redirect(WEB_ROOT.'/admin');
    }
}