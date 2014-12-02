<?php

class Web_Admin_Categorias_Wgt_Categorias
{

    public function render()
    {
        return $this->lista();
    }

    private function lista()
    {

        Ey::addConfig('activemenu', Ey::getPrm(1));

        $obj = new Web_Db_Categorias();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from('gk_categorias', array('cat_id', 'cat_padre_id', 'cat_nombre', 'cat_estado'))
                ->where('cat_padre_id=?', 0)
                ->where('cat_estado<>?', 2)
                ->order('cat_nombre');
        $pager = new Ey_Pager($select, WEB_ROOT . '/admin/categorias/main', Ey::getPrm(3), 30);
        $rsCategorias = $pager->fetchAll();
        $navegador = $pager->getNavigation();
//        print_r($rsCategorias);

        if (!is_null($rsCategorias)) {

            $categorias = array();

            foreach ($rsCategorias as $row) {

                /* consulta para saber si la categoria tiene productos */
                $obj2 = new Web_Db_CategoriasDetalle();
                $db2 = $obj2->getAdapter();
                $rsProductos = $db2->fetchAll($obj2->select()
                                        ->from('gk_categorias_detalle', array('det_pro_id'))
                                        ->where('det_padre_id=?', $row->cat_id)
                                        ->where('det_cat_id=?', 0));
//                print_r($rsProductos);

                $productos = count($rsProductos);

                if ($productos == 0) {
                    $verproductos = $productos;
                } else {
                    $verproductos = '<a class="deta" title="ver productos" href="' . WEB_ROOT . '/admin/categorias/productos-ver/' . $row->cat_id . '/1">' . $productos . '</a>';
                }

                if ($row->cat_estado != 1) {
                    $bloquear = '<a title="Inactivo" href="' . WEB_ROOT . '/admin/categorias/svc/activar-categoria/' . $row->cat_id . '/1">
                                    <img src="' . WEB_ROOT . '/img/admin/inactive.png" /></a>';
                } else {
                    $bloquear = '<a title="Activo" href="' . WEB_ROOT . '/admin/categorias/svc/activar-categoria/' . $row->cat_id . '/0">
                                    <img src="' . WEB_ROOT . '/img/admin/active.png" /></a>';
                }

                $modificar = '<a title="Editar" href="' . WEB_ROOT . '/admin/categorias/modificar-categoria/' . $row->cat_id . '">
                                <img src="' . WEB_ROOT . '/img/admin/edit.png" width="16" height="16" /></a>';

                $eliminar = '<a title="Eliminar" href="' . WEB_ROOT . '/admin/categorias/svc/eliminar-categoria/' . $row->cat_id . '" class="adm_alert_delete">
                                <img src="' . WEB_ROOT . '/img/admin/delete.png" /></a>';

                $agregar = '<a title="Agregar" href="' . WEB_ROOT . '/admin/categorias/nueva-subcategoria/' . $row->cat_id . '">
                                <img src="' . WEB_ROOT . '/img/admin/add.png" /></a>';

                $categorias[] = array('id' => $row->cat_id,
                    'nombre' => $row->cat_nombre,
                    'productos' => $verproductos,
                    'bgcolor' => 'first',
                    'agregar' => $agregar,
                    'bloquear' => $bloquear,
                    'modificar' => $modificar,
                    'eliminar' => $eliminar);
            }

//            $obj = new Web_Db_Categorias();
//            $db = $obj->getAdapter();
            $rsSubCategorias = $db->fetchAll($obj->select()
                                    ->from('gk_categorias', array('cat_id', 'cat_padre_id', 'cat_nombre', 'cat_estado'))
                                    ->where('cat_padre_id<>?', 0)
                                    ->where('cat_estado<>?', 2));
//            print_r($rsSubCategorias);


            if (!is_null($rsSubCategorias)) {

                $subCategorias = array();

                foreach ($rsSubCategorias as $item) {

                    /* consulta para saber si la categoria tiene productos */
//                    $obj2 = new Web_Db_CategoriasDetalle();
//                    $db2 = $obj2->getAdapter();
                    $rsProductos = $db2->fetchAll($obj2->select()
                                            ->from('gk_categorias_detalle', array('det_pro_id'))
                                            ->where('det_cat_id=?', $item->cat_id));
//                    print_r($rsProductos);

                    $productos = count($rsProductos);

                    if ($productos == 0) {
                        $verproductos = $productos;
                    } else {
                        $verproductos = '<a class="deta" title="ver productos" href="' . WEB_ROOT . '/admin/categorias/productos-ver/' . $item->cat_id . '">' . $productos . '</a>';
                    }

                    if ($item->cat_estado != 1) {
                        $bloquear = '<a title="Inactivo" href="' . WEB_ROOT . '/admin/categorias/svc/activar-categoria/' . $item->cat_id . '/1">
                                        <img src="' . WEB_ROOT . '/img/admin/inactive.png" /></a>';
                    } else {
                        $bloquear = '<a title="Activo" href="' . WEB_ROOT . '/admin/categorias/svc/activar-categoria/' . $item->cat_id . '/0">
                                        <img src="' . WEB_ROOT . '/img/admin/active.png" /></a>';
                    }

                    $modificar = '<a title="Editar" href="' . WEB_ROOT . '/admin/categorias/modificar-subcategoria/' . $item->cat_id . '">
                                    <img src="' . WEB_ROOT . '/img/admin/edit.png" width="16" height="16" /></a>';

                    $eliminar = '<a title="Eliminar" href="' . WEB_ROOT . '/admin/categorias/svc/eliminar-subcategoria/' . $item->cat_id . '" class="adm_alert_delete">
                                    <img src="' . WEB_ROOT . '/img/admin/delete.png" /></a>';

                    $subCategorias[] = array('nombre' => $item->cat_nombre,
                        'id' => $item->cat_padre_id,
                        'productos' => $verproductos,
                        'bgcolor' => 'second',
                        'bloquear' => $bloquear,
                        'modificar' => $modificar,
                        'eliminar' => $eliminar);
                }
            }

            $smarty = new Smarty_Engine();
            $smarty->assign('sub', $subCategorias);
            $smarty->assign('categorias', $categorias);
            $smarty->assign('navigator', $navegador);
            $smarty->assign('total', $pager->recordCount());

            if (count($rsCategorias) <= 0) {
                $smarty->assign('footermsg', 'Aun no se han creado Categorías');
            }

            return $smarty->fetch(ADMIN_CATEGORIAS_DIR . DS . 'tpl' . DS . 'categorias.tpl');
        }
    }

}