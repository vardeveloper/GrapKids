<?php

class Web_ProductoDetalle extends Web_BasePage
{

    public function mainContent()
    {
        parent::add_js_link('http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4cc39f1c52e951ee');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');
//        parent::add_css_link(BASE_WEB_ROOT . '/css_pirobox/style_1/style.css');
//        parent::add_js_link(BASE_WEB_ROOT . '/js/jquery-ui-1.8.2.custom.min.js');
//        parent::add_js_link(BASE_WEB_ROOT . '/js/pirobox_extended.js');
        parent::add_css_link(BASE_WEB_ROOT . '/css/nivo-gallery.css');
        parent::add_js_link(BASE_WEB_ROOT . '/js/jquery.nivo.gallery.min.js');

        $pro_key = Ey::getPrm(1);

        $obj = new Web_Db_Productos();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from('gk_productos', array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_oferta', 'pro_descuento', 'pro_video'))
                ->where('pro_key=\'' . $pro_key . '\'');
        $rows = $db->fetchRow($select);

        parent::set_title(ucwords($rows->pro_nombre) . ' | Grap Kids');
        parent::add_head_content('<meta name="Keywords" content="" />');
        parent::add_head_content('<meta name="Description" content="' . Ey::recortar(strip_tags($rows->pro_descripcion), 150) . '" />');
        parent::add_head_content('<link rel="image_src" href="' . BASE_WEB_ROOT . '/svc/get-img/productos-pro_' . $rows->pro_id . '_small/150" />');

        $Thumb = '';
        for ($i = 1; $i < 7; $i++) {
            if (file_exists(DATA_DIR . DS . 'img' . DS . 'productos' . DS . 'pro_' . $rows->pro_id . '_' . $i . '.jpg')) {
                $Thumb.= '<li data-title="Grap Kids" data-caption="' . $rows->pro_nombre . '"><img src="' . BASE_WEB_ROOT . '/svc/get-img/productos-pro_' . $rows->pro_id . '_' . $i . '" /></li>';
            }
        }

        /*   Obtenemos el nombre de la categoria   */

        $obj2 = new Web_Db_CategoriasDetalle();
        $db2 = $obj2->getAdapter();
        $select2 = $db2->select()
                ->from('gk_categorias_detalle', array('det_padre_id'))
                ->where('det_pro_id=?', $rows->pro_id);
        $cate = $db2->fetchRow($select2);
        $cateNombre = Web_Db_Function::getUnidadNombre($cate->det_padre_id);

        $obj3 = new Web_Db_Categorias();
        $cat_key = $this->obtenerKey($obj3, 'cat', $cate->det_padre_id);

        $smarty = new Smarty_Engine();
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());
        $smarty->assign('producto', $rows);
        $smarty->assign('Thumb', $Thumb);
        $smarty->assign('cat_key', $cat_key);
        $smarty->assign('cat_nombre', ucwords($cateNombre));

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'producto-detalle.tpl');
    }

}