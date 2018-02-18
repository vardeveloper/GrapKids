<?php

class Web_Svc_Boletin
{

    public function doIt()
    {
        $this->enviarBoletin();
    }

    private function enviarBoletin()
    {
        if ($_POST['boletin']) {
            $obj = new Web_Db_Boletin();
            $row = array('bol_email' => $_POST['boletin']);
            $obj->insert($row);
        }
    }

}