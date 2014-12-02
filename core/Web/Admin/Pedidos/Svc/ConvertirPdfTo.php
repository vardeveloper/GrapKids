<?php

require_once 'html2pdf/html2pdf.class.php';

class Web_Admin_Pedidos_Svc_ConvertirPdfTo
{

    public function doIt()
    {
        $this->convertirPdf();
    }

    private function convertirPdf()
    {
        $car_id = $_SESSION['car_id'];

        if ($car_id) {
            $obj = new Web_Db_Carrito();
            $db = $obj->getAdapter();
            $carrito = $db->fetchRow($obj->select()
                            ->where('car_id=?', $car_id));

            if ($carrito) {
                $obj2 = new Web_Db_CarritoDetalle();
                $db2 = $obj2->getAdapter();
                $products = $db2->fetchAll($obj2->select()
                                ->where('det_car_id=?', $car_id));

                $productos = array();
                $con = 1;

                foreach ($products as $value) {
                    $precio = ($value->det_pro_precio - (($value->det_pro_precio * $value->det_pro_descuento) / 100));
                    $subtotal = $precio * $value->det_pro_cantidad;
                    $total+=$subtotal;
                    
                    /* imagenes del servicio */
                    $imagenes = array();
//                    for ($i = 1; $i < 7; $i++) {
//                        $imagenes[] = array('img' => BASE_WEB_ROOT . '/svc/get-img/productos-pro_' . $value->det_pro_id . '_' . $i . '/593:397');
                        $imagenes[] = array('img' => BASE_WEB_ROOT . '/svc/get-img/productos-pro_' . $value->det_pro_id . '/593:397');
//                    }
                    /* fin */
                    
//                    $rsPro =  Web_Db_Producto::obtenerRegistro($value->det_pro_id);
//                    $detalle =  $rsPro->pro_contenido;

                    $productos[] = array('item' => $con,
                        'imagenes' => $imagenes,
                        'id' => $value->det_pro_id,
                        'nombre' => $value->det_pro_nombre,
//                        'detalle' => $detalle,
                        'cantidad' => $value->det_pro_cantidad,
                        'descuento' => $value->det_pro_descuento,
                        'precio' => number_format($value->det_pro_precio, 2, '.', ','),
                        'subtotal' => number_format($subtotal, 2, '.', ','));
                    $con+=1;
                }

                $total = number_format($total, 2, '.', ',');

                $obj3 = new Web_Db_Clientes();
                $db3 = $obj3->getAdapter();
                $cliente = $db3->fetchRow($obj3->select()
                                ->from('gk_clientes', array('cli_empresa', 'cli_ruc', 'cli_nombre', 'cli_apellido', 'cli_direccion', 'cli_email', 'cli_telefono', 'cli_celular'))
                                ->where('cli_id=?', $carrito->car_usu_id));
                $cliente->cli_nombre = ucwords($cliente->cli_nombre);
            }
        }

//        $array = Array
//            (
//            'TM98800G' => Array
//                (
//                'zid' => Array
//                    (
//                    '0' => 90001,
//                    '1' => 90002,
//                    '2' => 90003,
//                    '3' => 90004,
//                    '4' => 90005
//                ),
//                'count' => Array
//                    (
//                    '0' => 10,
//                    '1' => 10,
//                    '2' => 20,
//                    '3' => 25,
//                    '4' => 15
//                )
//            ),
//            'TM76654G' => Array
//                (
//                'zid' => Array
//                    (
//                    '0' => 90301,
//                    '1' => 90302,
//                    '2' => 90303,
//                    '3' => 90304,
//                    '4' => 90305
//                ),
//                'count' => Array
//                    (
//                    '0' => 25,
//                    '1' => 25,
//                    '2' => 20,
//                    '3' => 35,
//                    '4' => 45
//                )
//            )
//        );

//        echo '<pre>';
//        print_r($productos);
//        echo '</pre>';
//        exit();

        $smarty = new Smarty_Engine();
//        $smarty->assign('array', $array);
        $smarty->assign('total', $total);
        $smarty->assign('cliente', $cliente);
        $smarty->assign('carrito', $carrito);
        $smarty->assign('productos', $productos);
        $smarty->assign('fecha', Ey::fechaFormateada(getdate()));

//        return $smarty->fetch(ADMIN_PEDIDOS_DIR . DS . 'tpl' . DS . 'pdf-cotizacion-two.tpl');

        $message_body = $smarty->fetch(ADMIN_PEDIDOS_DIR . DS . 'tpl' . DS . 'pdf-cotizacion-to.tpl');

        $html2pdf = new HTML2PDF('P', 'A4', 'es');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($message_body);
        $html2pdf->Output('C_' . $cliente->cli_nombre . '_' . $car_id . '.pdf');
    }

}