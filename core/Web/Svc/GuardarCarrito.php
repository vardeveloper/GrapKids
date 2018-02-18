<?php

class Web_Svc_GuardarCarrito
{

    public function doIt()
    {
        $this->enviarformulario();
    }

    private function enviarformulario()
    {
        if (!Ey_Login::isLogged()) {
            Ey::redirect(WEB_ROOT . '/login');
        }

        if (!isset($_SESSION['eyoriacart']) || count($_SESSION['eyoriacart']) == '') {
            $_SESSION['enviado'] = 'Agrege productos a la lista a cotizar';
            Ey::redirect(WEB_ROOT . '/mi-carrito');
        }

        /*  Registro del carrio de compras */
        $obj = new Web_Db_Carrito();
        $row = array('car_usu_id' => $_SESSION['usr']['cli_id'],
                    'car_fecha_registro' => date('Y-m-d H:i:s'),
                    'car_estado' => 1);
        $obj->insert($row);
        $car_id = $obj->getAdapter()->lastInsertId();

        /*  Registro de todos los productos del carrito */
        $obj2 = new Web_Db_CarritoDetalle();
        foreach ($_SESSION['matriz'] as $carrito) {
            $row2 = array('det_car_id' => $car_id,
                        'det_pro_id' => $carrito['pro_id'],
                        'det_pro_nombre' => $carrito['pro_titulo'],
                        'det_pro_precio' => $carrito['pro_precio'],
                        'det_pro_cantidad' => $carrito['pro_cantidad'],
                        'det_pro_descuento' => $carrito['pro_descuento']);
                        
            $obj2->insert($row2);
        }

        unset($_SESSION['matriz']);
        unset($_SESSION['eyoriacart']);

        $_SESSION['enviado'] = 'Le responderemos a la brevedad, le enviaremos a su correo un mensaje con los productos ya cotizados.';

        
        /*      Envio de mail al cliente con el detalle de su compra     */
        if ($car_id) {
//            $obj = new Web_Db_Carrito();
            $carrito = $obj->fetchRow($obj->select()
                                    ->where('car_id=?', $car_id));
            if ($carrito) {
//                $obj2 = new Web_Db_CarritoDetalle();
                $productos = $obj2->fetchAll($obj2->select()
                                        ->where('det_car_id=?', $car_id));
            }
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('cliente', ucwords($_SESSION['usr']['cli_nombre']) . ' ' . ucwords($_SESSION['usr']['cli_apellido']));
        $smarty->assign('email', $_SESSION['usr']['cli_email']);
        $smarty->assign('carrito', $carrito);
        $smarty->assign('productos', $productos);

        $message_body = Ey::utfToIso($smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'mail-compra.tpl'));

        $mail = new Zend_Mail();
        $mail->setBodyHtml($message_body);
        $mail->setFrom('grapkids@gmail.com', 'GRAP KIDS');
        $mail->addTo('grap_kids@hotmail.com');
//        $mail->addBcc('grap_kids@hotmail.com');
        $mail->setSubject(Ey::utfToIso('Pedido # ' . $car_id));
        $mail->send();
        /* ------------------------------------------------- */
        

        Ey::redirect(WEB_ROOT . '/mi-carrito');
    }

}