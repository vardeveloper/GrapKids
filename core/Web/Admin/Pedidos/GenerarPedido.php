<?php

class Web_Admin_Pedidos_GenerarPedido extends Web_Admin_MainPage
{

    public function mainContent()
    {
        parent::add_js_link(BASE_WEB_ROOT . '/js/jquery.1.7.1.js');
        parent::add_js_link(BASE_WEB_ROOT . '/js/jquery.ui.1.8.16.js');
        parent::add_css_link(BASE_WEB_ROOT . '/css/jquery.ui.css');
        return $this->_getGenerarPedido();
    }

    private function _getGenerarPedido()
    {
        $carro = $_SESSION['eyoriacart'];
        
        global $db;

        if (isset($carro)) {
            foreach ($carro as $item) {
                
                $pro = $db->fetchRow($db->select()
                                        ->from('gk_productos', array('pro_nombre'))
                                        ->where('pro_id=?', $item['item_id']));
                
//                echo "<pre>";
//                print_r($pro);
//                echo "</pre>";
                
//                $cart = new Web_Admin_Pedidos_Svc_EyCarrito;

                $importe = $item['item_price'] * $item['cantidad'];
                
                $subtotal+= $importe;
                
                $eliminar = '<a href="' . WEB_ROOT . '/svc/elimina-elemento/' . $item['item_id'] . '"><img src="' . WEB_ROOT . '/img/delete.png" /></a>';
                
                $matriz[] = array('id' => $item['item_id'],
                    'nombre' => $pro->pro_nombre,
                    'precio' => $item['item_price'],
                    'cantidad' => $item['cantidad'],
                    'importe' => $importe,
                    'eliminar' => $eliminar);
                
            }
        }
        
        $_SESSION['matriz'] = $matriz;
        $_SESSION['subtotal'] = $subtotal;
        $total = number_format($subtotal, 2, '.', ',');

        
        $smarty = new Smarty_Engine();
        $smarty->assign('matriz', $matriz);
        $smarty->assign('subtotal', $subtotal);
        $smarty->assign('total', $total);

        return $smarty->fetch(ADMIN_PEDIDOS_DIR . DS . 'tpl' . DS . 'generar-pedido.tpl');
    }

}