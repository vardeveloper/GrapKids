<?php

class Web_MiCarrito extends Web_BasePage 
{

    public function mainContent() 
    {
        parent::set_title('Lista de Productos a Cotizar | Grap Kids');
        parent::add_head_content('<meta name="Keywords" content="" />');
        parent::add_head_content('<meta name="Description" content="" />');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');

        $carro = $_SESSION['eyoriacart'];
        global $db;

        if (isset($carro)) {
            foreach ($carro as $item) {
                $pro = $db->fetchRow($db->select()
                                        ->from('gk_productos')
                                        ->where('pro_id=?', $item['item_id']));

                $matriz[] = array('pro_id' => $item['item_id'],
                                'pro_titulo' => $pro->pro_nombre,
                                'pro_key' => $pro->pro_key,
                                'pro_precio' => $pro->pro_precio,
                                'pro_cantidad' => $item['cantidad'],
                                'pro_descuento' => $pro->pro_descuento);
            }
        }

        $_SESSION['matriz'] = $matriz;

        $smarty = new Smarty_Engine();
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());
        $smarty->assign('matriz', $matriz);

        if (isset($_SESSION['enviado'])) {
            $enviado = $_SESSION['enviado'];
            unset($_SESSION['enviado']);
        }
        
        $smarty->assign('enviado', $enviado);

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'mi-carrito.tpl');
    }

}