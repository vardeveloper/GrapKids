<?php

class Web_Svc_LoOff
{

    public function doIt()
    {
        $this->loOff();
    }

    public function loOff()
    {
        unset($_SESSION['usr']);
        
        Ey::goHome();
    }

}