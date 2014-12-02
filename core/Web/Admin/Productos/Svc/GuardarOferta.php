<?php

class Web_Admin_Productos_Svc_GuardarOferta
{

    public function doIt()
    {
        $this->activar();
    }

    private function activar()
    {
        $pro_id = Ey::getPrm(4);
        
        $opc = Ey::getPrm(5);
        
        $obj = new Web_Db_Productos();
        
        if ($opc == "1") {
            if ($_POST['pro_precio_oferta'] == '' && $_POST['pro_descuento'] == '' && $_POST['pro_valor1'] == '' && $_POST['pro_valor2'] == '') {
                $error['pro_precio_oferta'] = 'Ingrese Datos';
            }
            if (count($error) > 0) {
                $_SESSION['post'] = $_POST;
                $_SESSION['error'] = $error;
                Ey::redirect($_SERVER['HTTP_REFERER']);
            }
            if ($_POST['pro_precio_oferta'] == '') {
                $_POST['pro_precio_oferta'] = null;
            }
            if ($_POST['pro_descuento'] == '') {
                $_POST['pro_descuento'] = null;
            }
            if ($_POST['pro_valor1'] == '') {
                $_POST['pro_valor1'] = null;
            }
            if ($_POST['pro_valor2'] == '') {
                $_POST['pro_valor2'] = null;
            }
            $row = array('pro_oferta' => 1,
                'pro_precio_oferta' => $_POST['pro_precio_oferta'],
                'pro_descuento' => $_POST['pro_descuento'],
                'pro_valor_a' => $_POST['pro_valor1'],
                'pro_valor_b' => $_POST['pro_valor2']);
        } else {
            $row = array('pro_oferta' => 0,
                'pro_precio_oferta' => null,
                'pro_descuento' => null,
                'pro_valor_a' => null,
                'pro_valor_b' => null);
        }
        
        $obj->update($row, 'pro_id=' . $pro_id);
        
        Ey::redirect(WEB_ROOT . '/admin/productos');
    }

}