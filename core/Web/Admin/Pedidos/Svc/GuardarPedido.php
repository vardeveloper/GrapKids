<?php

class Web_Admin_Pedidos_Svc_GuardarPedido
{

    public function doIt()
    {
        $this->enviarformulario();
    }

    private function enviarformulario()
    {
        if ($_POST['cliNombre'] == '') {
            $error['cliNombre'] = 'Ingrese Cliente';
        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::goBack();
        }
        
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
//        exit;

        /*  Registro del carrio de compras */
        $obj = new Web_Db_Carrito();
        $row = array('car_usu_id' => $_POST['cliId'],
            'car_fecha_registro' => date('Y-m-d H:i:s'),
            'car_estado' => 1);
        $obj->insert($row);
        $car_id = $obj->getAdapter()->lastInsertId();

        /*  Registro de todos los productos del carrito */
        $obj2 = new Web_Db_CarritoDetalle();
        foreach ($_SESSION['matriz'] as $carrito) {
            $row2 = array('det_car_id' => $car_id,
                'det_pro_id' => $carrito['id'],
                'det_pro_nombre' => $carrito['nombre'],
                'det_pro_cantidad' => $carrito['cantidad'],
                'det_pro_precio' => $carrito['importe']);
            $obj2->insert($row2);
        }

        unset($_SESSION['subtotal']);
        unset($_SESSION['matriz']);
        unset($_SESSION['eyoriacart']);

        Ey::redirect(WEB_ROOT . '/admin/pedidos');
    }

}