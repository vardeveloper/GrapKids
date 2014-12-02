<?php

require_once 'html2pdf/html2pdf.class.php';

class Web_Admin_Pedidos_Svc_ConvertirPdf
{

    public function doIt()
    {
        $this->convertirPdf();
        exit;
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

                    $productos[] = array('item' => $con,
                                        'id' => $value->det_pro_id,
                                        'nombre' => $value->det_pro_nombre,
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
                $cliente->cli_apellido = ucwords($cliente->cli_apellido);
            }
        }
        
        $smarty = new Smarty_Engine();
        $smarty->assign('total', $total);
        $smarty->assign('cliente', $cliente);
        $smarty->assign('carrito', $carrito);
        $smarty->assign('productos', $productos);
        $smarty->assign('fecha', Ey::fechaFormateada(getdate()));

        $message_body = $smarty->fetch(ADMIN_PEDIDOS_DIR . DS . 'tpl' . DS . 'pdf-cotizacion.tpl');

        $html2pdf = new HTML2PDF('P', 'A4', 'es');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($message_body);
        $html2pdf->Output('C_' . $cliente->cli_apellido . '_' . $car_id . '.pdf');
    }

}