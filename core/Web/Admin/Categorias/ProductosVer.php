<?php

class Web_Admin_Categorias_ProductosVer extends Web_Admin_MainPage
{

    public function mainContent()
    {
        parent::add_js_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.js');
        parent::add_css_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.css');
        return $this->lista();
    }

    private function lista()
    {
        Ey::addConfig('activemenu', Ey::getPrm(1));

        $cat_id = Ey::getPrm(3);
        
        $opc = Ey::getPrm(4);

        if ($opc == 1) {
            $obj = new Web_Db_CategoriasDetalle();
            $db = $obj->getAdapter();
            $select = $db->select()
                    ->from(array('tb1' => 'gk_categorias_detalle'))
                    ->joinInner(array('tb2' => 'gk_productos'), 'tb1.det_pro_id=tb2.pro_id', array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio'))
                    ->joinInner(array('tb3' => 'gk_categorias'), 'tb1.det_padre_id=tb3.cat_id', array('cat_nombre'))
                    ->where('det_padre_id=?', $cat_id)
                    ->where('det_cat_id=?', 0)
                    ->order('pro_nombre');
            $pager = new Ey_Pager($select, WEB_ROOT . '/admin/categorias/productos-ver/' . $cat_id . '/1', Ey::getPrm(5), 15);
            $rows = $pager->fetchAll();
            $navegador = $pager->getNavigation();
        } else {
            $obj = new Web_Db_CategoriasDetalle();
            $db = $obj->getAdapter();
            $select = $db->select()
                    ->from(array('tb1' => 'gk_categorias_detalle'))
                    ->joinInner(array('tb2' => 'gk_productos'), 'tb1.det_pro_id=tb2.pro_id', array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio'))
                    ->joinInner(array('tb3' => 'gk_categorias'), 'tb1.det_cat_id=tb3.cat_id', array('cat_nombre'))
                    ->where('det_cat_id=?', $cat_id)
                    ->order('pro_nombre');
            $pager = new Ey_Pager($select, WEB_ROOT . '/admin/categorias/productos-ver/' . $cat_id . '/0', Ey::getPrm(5), 15);
            $rows = $pager->fetchAll();
            $navegador = $pager->getNavigation();
        }
        
//        print_r($rows);

        if (!is_null($rows)) {

            $productos = array();

            foreach ($rows as $row) {
                if ($sw == 1) {
                    $bgcolor = 'second';
                    $sw = 0;
                } else {
                    $bgcolor = 'first';
                    $sw = 1;
                }
                
                $eliminar = Ey::crearBoton(WEB_ROOT . '/admin/categorias/svc/eliminar-relacion/' . $row->det_id, 'Eliminar', 'adm_btn_alert adm_alert_delete');

                $html2 = '<a class="deta" href="' . WEB_ROOT . '/admin/productos/detalle-producto/' . $row->pro_id . '">' . $row->pro_nombre . '</a>';

                $productos[] = array('id' => $row->pro_id,
                    'html2' => $html2,
                    'producto' => $row->pro_nombre,
                    'intro' => Ey::recortar($row->pro_descripcion, 200),
                    'precio' => number_format($row->pro_precio, 2, '.', ','),
//                    'categoria' => $row->cat_nombre,
                    'eliminar' => $eliminar,
                    'bgcolor' => $bgcolor);
            }

            $smarty = new Smarty_Engine();
            $smarty->assign('navigator', $navegador);
            $smarty->assign('productos', $productos);
            $smarty->assign('categoria', $row->cat_nombre);
            $smarty->assign('total', $pager->recordCount());

            return $smarty->fetch(ADMIN_CATEGORIAS_DIR . DS . 'tpl' . DS . 'productos-ver.tpl');
        }
    }

}