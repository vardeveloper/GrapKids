<?php

class Web_Admin_Productos_Wgt_Productos
{

    public function __construct($context)
    {
        $context->add_js_link(BASE_WEB_ROOT . '/admin/svc/get-js/ajaxcombosubcategoria');
        $context->add_js_link(BASE_WEB_ROOT . '/js/jqueryTools.js');
        $context->add_css_link(BASE_WEB_ROOT . '/css/tooltip-generic.css');
    }

    public function render()
    {
        return $this->lista();
    }

    private function lista()
    {
        Ey::addConfig('activemenu', Ey::getPrm(1));

        if (isset($_SESSION['filtrar']) && $_SESSION['filtrar']['seccion'] == 'producto') {
            $unidadSelected = $_SESSION['filtrar']['unidad'];
            $categoriaSelected = $_SESSION['filtrar']['categoria'];
            $order = $_SESSION['filtrar']['order'];
        }

        $optionsUnidad = Web_Db_Function::getUnidadOptions($unidadSelected);
        $optionsCategoria = Web_Db_Function::getAllCategoriaOptions($unidadSelected, $categoriaSelected);

        $obj = new Web_Db_Productos();

        $db = $obj->getAdapter();

        $htmlOrden = '<select name="order">';
        if ($order != '') {
            if ($order == 1) {
                $select = $db->select()
                        ->from(array('pro' => 'gk_productos'), array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio', 'pro_estado', 'pro_destacar', 'pro_oferta'))
                        ->where('pro.pro_estado = ?', 0)
                        ->order('pro_id desc');
                $htmlOrden.='<option value=""> - Seleccionar - </option>';
                $htmlOrden.='<option selected="selected" value="1">Novedades</option>';
                $htmlOrden.='<option value="2">Destacados</option>';
                $htmlOrden.='<option value="3">Promociones</option>';
            }
            if ($order == 2) {
                $select = $db->select()
                        ->from(array('pro' => 'gk_productos'), array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio', 'pro_estado', 'pro_destacar', 'pro_oferta'))
                        ->where('pro.pro_estado <> ?', 2)
                        ->where('pro.pro_destacar = ?', 1)
                        ->order('pro_id desc');
                $htmlOrden.='<option value=""> - Seleccionar - </option>';
                $htmlOrden.='<option value="1">Novedades</option>';
                $htmlOrden.='<option selected="selected" value="2">Destacados</option>';
                $htmlOrden.='<option value="3">Promociones</option>';
            }
            if ($order == 3) {
                $select = $db->select()
                        ->from(array('pro' => 'gk_productos'), array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio', 'pro_estado', 'pro_destacar', 'pro_oferta'))
                        ->where('pro.pro_estado <> ?', 2)
                        ->where('pro.pro_oferta = ?', 1)
                        ->order('pro_id desc');
                $htmlOrden.='<option value=""> - Seleccionar - </option>';
                $htmlOrden.='<option value="1">Novedades</option>';
                $htmlOrden.='<option value="2">Destacados</option>';
                $htmlOrden.='<option selected="selected" value="3">Promociones</option>';
            }
        } else {
            $select = $db->select()
                    ->from(array('pro' => 'gk_productos'), array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio', 'pro_estado', 'pro_destacar', 'pro_oferta'))
                    ->where('pro.pro_estado <> ?', 2)
                    ->order('pro_id desc');
            $htmlOrden.='<option value=""> - Seleccionar - </option>';
            $htmlOrden.='<option value="1">Novedades</option>';
            $htmlOrden.='<option value="2">Destacados</option>';
            $htmlOrden.='<option value="3">Promociones</option>';
        }
        $htmlOrden.='</select>';

        if ($unidadSelected > 0) {
            if ($categoriaSelected > 0) {
                $select = $db->select()
                        ->from(array('pro' => 'gk_productos'), array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio', 'pro_estado', 'pro_destacar', 'pro_oferta'))
                        ->joinInner(array('det' => 'gk_categorias_detalle'), 'pro.pro_id=det_pro_id', array('det_padre_id', 'det_cat_id'))
                        ->where('pro.pro_estado <> ?', 2)
                        ->where('det.det_padre_id = ?', $unidadSelected)
                        ->where('det.det_cat_id = ?', $categoriaSelected)
                        ->order('pro_id desc');
            } else {
                $select = $db->select()
                        ->from(array('pro' => 'gk_productos'), array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio', 'pro_estado', 'pro_destacar', 'pro_oferta'))
                        ->joinInner(array('det' => 'gk_categorias_detalle'), 'pro.pro_id=det_pro_id', array('det_padre_id'))
                        ->where('pro.pro_estado <> ?', 2)
                        ->where('det.det_padre_id = ?', $unidadSelected)
                        ->order('pro_id desc');
            }
        }/* else {
          $select = $db->select()
          ->from(array('pro' => 'gk_productos'), array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio', 'pro_estado', 'pro_destacar', 'pro_oferta'))
          ->where('pro.pro_estado <> ?', 2)
          ->order('pro_id desc');
          } */

        $pager = new Ey_Pager($select, WEB_ROOT . '/admin/productos/main', Ey::getPrm(3), 50);
        $rows = $pager->fetchAll();
        $navegador = $pager->getNavigation();

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

                if ($row->pro_estado != 1) {
                    $bloquear = '<a href="' . WEB_ROOT . '/admin/productos/svc/activar-producto/' . $row->pro_id . '/1" class="nuevo">
                                        <img src="' . WEB_ROOT . '/img/admin/new.png" /></a>';
                } else {
                    $bloquear = '<a href="' . WEB_ROOT . '/admin/productos/svc/activar-producto/' . $row->pro_id . '/0" class="activo">
                                        <img src="' . WEB_ROOT . '/img/admin/active.png" /></a>';
                }

                if ($row->pro_destacar != 1) {
                    $destacado = '<a href="' . WEB_ROOT . '/admin/productos/svc/destacar-producto/' . $row->pro_id . '/1" class="destacar">
                                        <img src="' . WEB_ROOT . '/img/admin/inactive.png" /></a>';
                } else {
                    $destacado = '<a href="' . WEB_ROOT . '/admin/productos/svc/destacar-producto/' . $row->pro_id . '/0" class="destacado">
                                        <img src="' . WEB_ROOT . '/img/admin/active.png" /></a>';
                }

                if ($row->pro_oferta != 1) {
                    $oferta = '<a href="' . WEB_ROOT . '/admin/productos/oferta-producto/' . $row->pro_id . '" class="ofertar">
                                        <img src="' . WEB_ROOT . '/img/admin/inactive.png" /></a>';
                } else {
                    $oferta = '<a href="' . WEB_ROOT . '/admin/productos/svc/guardar-oferta/' . $row->pro_id . '/0" class="ofertado">
                                        <img src="' . WEB_ROOT . '/img/admin/oferta.png" /></a>';
                }

                $modificar = '<a href="' . WEB_ROOT . '/admin/productos/modificar-producto/' . $row->pro_id . '" class="editar">
                                    <img src="' . WEB_ROOT . '/img/admin/edit.png" width="16" height="16" /></a>';

                $eliminar = '<a href="' . WEB_ROOT . '/admin/productos/svc/bloquear-producto/' . $row->pro_id . '" class="desactivar">
                                    <img src="' . WEB_ROOT . '/img/admin/cancel.png" /></a>';

                $categorias = '<a href="' . WEB_ROOT . '/admin/productos/categorias/' . $row->pro_id . '" class="categorias">
                                    <img src="' . WEB_ROOT . '/img/admin/detail.png" /></a>';

                $html2 = '<a href="' . WEB_ROOT . '/admin/productos/detalle-producto/' . $row->pro_id . '" class="deta">
                                              ' . $row->pro_nombre . '</a>';

                $productos[] = array('html2' => $html2,
                    'imagen' => BASE_WEB_ROOT . '/svc/get-img/productos-pro_' . $row->pro_id . '_small/150:113',
                    'descripcion' => Ey::recortar($row->pro_descripcion, 200),
                    'precio' => number_format($row->pro_precio, 2, '.', ','),
                    'categorias' => $categorias,
                    'oferta' => $oferta,
                    'destacado' => $destacado,
                    'bloquear' => $bloquear,
                    'modificar' => $modificar,
                    'eliminar' => $eliminar,
                    'bgcolor' => $bgcolor);
            }

            $smarty = new Smarty_Engine();
            $smarty->assign('tipo', $_SESSION['adm']['adm_tipo']);
            $smarty->assign('optionsUnidad', $optionsUnidad);
            $smarty->assign('optionsCategoria', $optionsCategoria);
            $smarty->assign('navigator', $navegador);
            $smarty->assign('productos', $productos);
            $smarty->assign('htmlOrden', $htmlOrden);
            $smarty->assign('total', $pager->recordCount());

            if (count($rows) <= 0) {
                $smarty->assign('footermsg', 'Aun no se han creado Productos');
            }

            return $smarty->fetch(ADMIN_PRODUCTOS_DIR . DS . 'tpl' . DS . 'productos.tpl');
        }
    }

}