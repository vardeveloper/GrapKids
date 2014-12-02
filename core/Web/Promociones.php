<?php

class Web_Promociones extends Web_BasePage 
{

    public function mainContent() 
    {
        parent::set_title('Promociones | Grap Kids');
        parent::add_head_content('<meta name="Keywords" content="juegos recreativos, juegos recreativos infantiles, juegos recreativos para niños, juegos recreativos deportivos, juegos recreativos peru, juegos infantiles, juegos acuaticos, juegos infantiles parques" />');
        parent::add_head_content('<meta name="Description" content="GRAP KIDS: Contamos con las mejores promociones y liquidaciones de Juegos Recreativos Infantiles, fabricados con insumos de alta calidad." />');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');
        parent::add_css_link(BASE_WEB_ROOT . '/css/paginador.css');

        $obj = new Web_Db_Productos();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from('gk_productos', array('pro_id', 'pro_estado', 'pro_nombre', 'pro_key', 'pro_precio', 
                                             'pro_precio_oferta', 'pro_descuento', 'pro_valor_a', 'pro_valor_b'))
                ->where('pro_estado<>?', 2)
                ->where('pro_oferta=?', 1);

        $pager = new Ey_Pager($select, WEB_ROOT . '/promociones', Ey::getPrm(1), 15);
        $rows = $pager->fetchAll();
        $navegador = $pager->getNavigation();

        foreach ($rows as $item) {
            $item->imagen = BASE_WEB_ROOT . '/svc/get-img/productos-pro_' . $item->pro_id . '_small/200:150';
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('productos', $rows);
        $smarty->assign('navigator', $navegador);
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'promociones.tpl');
    }

}