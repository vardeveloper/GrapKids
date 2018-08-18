<?php

class Web_Main extends Web_BasePage 
{

    public function mainContent() 
    {
        parent::set_title('Juegos para Niños | Juegos Infantiles | Juegos Recreativos | Juegos Infantiles para Niños | Juegos Recreativos para Niños | Parques Infantiles | Fabrica de Juegos | Juegos Infantiles para Parques | Grap Kids Peru');
        parent::add_head_content('<link rel="image_src" href="'. BASE_WEB_ROOT .'/img/logo-grap-kids.jpg" />');
        parent::add_head_content('<meta name="google-site-verification" content="FBzJbIbkYTTnAEuPXiQotdt8GPh3MkNITQU9KLlekMY" />');
        parent::add_head_content('<meta name="Keywords" content="Juegos para Niños, Juegos Infantiles, Juegos Recreativos, Juegos Infantiles para Niños, Juegos Recreativos para Niños, Parques Infantiles, Fabrica de Juegos, Juegos Infantiles para Parques, Grap Kids Peru" />');
        parent::add_head_content('<meta name="Description" content="En GRAP KIDS ampliamos constantemente nuestra línea de Juegos para Niños, ofreciendo productos de alta calidad a un precio competitivo dentro del mercado." />');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');
//        parent::add_js_link(BASE_WEB_ROOT . '/yoxview/yoxview-init.js');
        
//        unset($_SESSION['usr']);

        global $db;
//        $obj = new Web_Db_Productos();
//        $db = $obj->getAdapter();
        $select = $db->select()
                        ->from('gk_productos', array('pro_id', 'pro_nombre', 'pro_key', 'pro_oferta', 'pro_descuento'))
//                        ->where('pro_destacar=?', 1)
                        ->where('pro_estado<>?', 2)
//                        ->order('RAND()')
                        ->order(array('pro_oferta DESC', 'RAND()'))
                        ->limit(20);
        $rs = $db->fetchAll($select);
//        print_r($rs);
        
//        /*Ofertas y Promociones*/
//        global $db;
//        $rsProductos = $db->fetchAll($db->select()
//                                ->from('gk_productos', array('pro_nombre', 'pro_key', 'pro_id'))
//                                ->where('pro_oferta=?', 1)
//                                ->where('pro_estado!=?', 2)
//                                ->order(array('pro_fecha_update DESC', 'pro_nombre')));
//
//        foreach ($rsProductos as $item) {
//            $promociones[] = array('id' => $item->pro_id,
//                                'key' => $item ->pro_key,
//                                'nombre' => $item->pro_nombre);
//        }

        $smarty = new Smarty_Engine();
        $smarty->assign('productos', $rs);
//        $smarty->assign('promociones', $promociones);
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());
        $smarty->assign('Banner', Web_Wgt_Banner::render());
        $smarty->assign('Slider', Web_Wgt_Slider::render());
        
        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'main.tpl');
    }

}