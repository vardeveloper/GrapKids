<?php

class Web_Admin_Productos_Categorias extends Web_Admin_MainPage
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

        $error = null;
        
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }

        $pro_id = Ey::getPrm(3);

        /* consulta para los datos del producto */
        global $db;
        $rsProducto = $db->fetchRow($db->select()
                                ->from('gk_productos', array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio', 'pro_fecha'))
                                ->where('pro_id=?', $pro_id));

        $rsProducto->html2 = '<a class="deta" href="' . WEB_ROOT . '/admin/productos/detalle-producto/' . $pro_id . '">' . $rsProducto->pro_nombre . '</a>';
        $rsProducto->pro_descripcion = Ey::recortar($rsProducto->pro_descripcion, 200);
        $rsProducto->pro_precio = number_format($rsProducto->pro_precio, 2, '.', ',');
//        print_r($rsProducto);

        /* consulta para visualizar todas las categorias padres */
        $obj = new Web_Db_Categorias();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from('gk_categorias', array('cat_id', 'cat_nombre'))
                ->where('cat_padre_id=?', 0)
                ->where('cat_estado<>?', 2)
                ->order('cat_nombre');
        $pager = new Ey_Pager($select, WEB_ROOT . '/admin/productos/categorias/' . $pro_id, Ey::getPrm(4), 30);
        $padres = $pager->fetchAll();
        $navegador = $pager->getNavigation();

        if (!is_null($padres)) {
            $categorias = array();
            $subcategorias = array();
            foreach ($padres as $padre) {
                /* consulta para saber si el producto esta relacionado con la categoria padre */
                $obj2 = new Web_Db_CategoriasDetalle();
                $db = $obj2->getAdapter();
                $select = $db->select()
                        ->from('gk_categorias_detalle', array('det_id'))
                        ->where('det_padre_id=?', $padre->cat_id)
                        ->where('det_cat_id=?', 0)
                        ->where('det_pro_id=?', $pro_id);
                $producto = $db->fetchRow($select);

                if ($producto) {
                    $eliminar = Ey::crearBoton(WEB_ROOT . '/admin/productos/svc/eliminar-relacion/' . $producto->det_id, 'Eliminar', 'adm_btn_alert adm_alert_delete');
                    $estado = '<img src="' . WEB_ROOT . '/img/admin/active.png" alt="Activo"/>';
                } else {
                    $estado = '&nbsp;';
                    $eliminar = '&nbsp;';
                }

                /* consulta para saber si la categoria padre tiene categorias hijos */
                $db = $obj->getAdapter();
                $select = $db->select()
                        ->from('gk_categorias', array('cat_id', 'cat_nombre', 'cat_padre_id'))
                        ->where('cat_estado<>?', 2)
                        ->where('cat_padre_id=?', $padre->cat_id);
                $categorias_hijos = $db->fetchAll($select);

                if ($categorias_hijos) {
                    $relacionar = '&nbsp;';
                } else {
                    $relacionar = Ey::crearBoton(WEB_ROOT . '/admin/productos/svc/guardar-relacion/' . $padre->cat_id . '/0/' . $pro_id, 'Relacionar', 'adm_btn_ok');
                }

                $categorias[] = array('cat_nombre' => $padre->cat_nombre,
                    'cat_id' => $padre->cat_id,
//                                'ids' => $padre->cat_id . ' - 0 - ' . $pro_id,
//                                'producto' => $producto->det_id,
                    'bgcolor' => 'first',
                    'estado' => $estado,
                    'relacionar' => $relacionar,
                    'eliminar' => $eliminar);

                /* consulta para visualizar todas las categorias hijos de cada categoria padre */
                $db = $obj->getAdapter();
                $select = $db->select()
                        ->from('gk_categorias', array('cat_id', 'cat_nombre', 'cat_padre_id'))
                        ->where('cat_estado<>?', 2)
                        ->where('cat_padre_id=?', $padre->cat_id);
                $hijos = $db->fetchAll($select);

                if (!is_null($hijos)) {
                    foreach ($hijos as $hijo) {
                        /* consulta para saber si el producto esta relacionado con la categoria padre y la categoria hijo */
                        $db = $obj2->getAdapter();
                        $select = $db->select()
                                ->from('gk_categorias_detalle', array('det_id'))
                                ->where('det_padre_id=?', $padre->cat_id)
                                ->where('det_cat_id=?', $hijo->cat_id)
                                ->where('det_pro_id=?', $pro_id);
                        $producto = $db->fetchRow($select);

                        if ($producto) {
                            $eliminar = Ey::crearBoton(WEB_ROOT . '/admin/productos/svc/eliminar-relacion/' . $producto->det_id, 'Eliminar', 'adm_btn_alert adm_alert_delete');
                            $estado = '<img src="' . WEB_ROOT . '/img/admin/active.png" alt="Activo"/>';
                        } else {
                            $estado = '&nbsp;';
                            $eliminar = '&nbsp;';
                        }

                        $relacionar = Ey::crearBoton(WEB_ROOT . '/admin/productos/svc/guardar-relacion/' . $hijo->cat_padre_id . '/' . $hijo->cat_id . '/' . $pro_id, 'Relacionar', 'adm_btn_ok');

                        $subcategorias[] = array('sub_id' => $hijo->cat_id,
                            'sub_id_padre' => $hijo->cat_padre_id,
                            'sub_nombre' => $hijo->cat_nombre,
//                                        'ids' => $hijo->cat_padre_id . ' - ' . $hijo->cat_id . ' - ' . $pro_id,
//                                        'producto' => $producto->det_id,
                            'bgcolor' => 'second',
                            'estado' => $estado,
                            'relacionar' => $relacionar,
                            'eliminar' => $eliminar);
                    }
                }
            }

            $smarty = new Smarty_Engine();
            $smarty->assign('error', $error);
            $smarty->assign('producto', $rsProducto);
            $smarty->assign('categorias', $categorias);
            $smarty->assign('subcategorias', $subcategorias);
            $smarty->assign('navigator', $navegador);

            if (count($padres) <= 0) {
                $smarty->assign('footermsg', 'Aun no se han creado las Categorías');
            }

            return $smarty->fetch(ADMIN_PRODUCTOS_DIR . DS . 'tpl' . DS . 'categorias.tpl');
        }
    }

}