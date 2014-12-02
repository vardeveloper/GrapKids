<?php

class Web_Categorias extends Web_BasePage
{

    public function mainContent()
    {
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');

        $cat_key = Ey::getPrm(1);

        $obj = new Web_Db_Categorias();
        $cat_id = $this->obtenerId($obj, 'cat', $cat_key);
        $cat_nombre = Web_Db_Function::getUnidadNombre($cat_id);

        /*  
         * Meta tags Analytics 
         */
        
        $db = $obj->getAdapter();
        $meta = $db->fetchRow($db->select()
                        ->from('gk_categorias', array('cat_nombre', 'cat_title', 'cat_description', 'cat_keywords', 'cat_analytics'))
                        ->where('cat_id=?', $cat_id));

        parent::set_title($meta->cat_title);
        parent::add_head_content('<meta name="Keywords" content="' . strip_tags($meta->cat_keywords) . '" />');
        parent::add_head_content('<meta name="Description" content="' . strip_tags($meta->cat_description) . '" />');

        /*  
         * Listado de Productos 
         */

        if ($cat_id) {
            $obj2 = new Web_Db_Productos();
            $db = $obj2->getAdapter();
            $select = $db->select()
                    ->from(array('pro' => 'gk_productos'), array('pro_id', 'pro_nombre', 'pro_key', 'pro_oferta', 'pro_descuento'))
                    ->joinInner(array('det' => 'gk_categorias_detalle'), 'pro.pro_id=det_pro_id', array('det_padre_id', 'det_cat_id'))
                    ->where('pro_estado<>?', 2)
                    ->where('det_padre_id=?', $cat_id)
                    ->order(array('pro_orden', 'pro_id DESC'));

            $pager = new Ey_Pager($select, WEB_ROOT . '/categorias/' . $cat_key, Ey::getPrm(2), 10);
            $rows = $pager->fetchAll();
            $navegador = $pager->getNavigation();

            foreach ($rows as $item) {
                $item->imagen = BASE_WEB_ROOT . '/svc/get-img/productos-pro_' . $item->pro_id . '/300:225';
            }
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());
        $smarty->assign('cat_key', $cat_key);
        $smarty->assign('categoria', $cat_nombre);
        $smarty->assign('productos', $rows);
        $smarty->assign('navigator', $navegador);
        $smarty->assign('analytics', $meta->cat_analytics);

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'categorias.tpl');
    }

}