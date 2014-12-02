<?php

class Web_Admin_Productos_Busqueda extends Web_Admin_MainPage
{

    public function mainContent()
    {
        parent::add_js_link(BASE_WEB_ROOT . '/js/jqueryTools.js');
        parent::add_css_link(BASE_WEB_ROOT . '/css/tooltip-generic.css');

        global $db;

        $criterio = urldecode(Ey::getPrm(3));

        $text = explode(':', $criterio);

        $array_no_arts[] = $text[1];

        $against_words = array();
        $like = array();

        // separar las palabras en dos grupos, las que tienen mas de 3 caracteres
        // de longitud para la busqueda FULLTEXT y las que tienen de menos o igual
        // a tres caracteres para la busqueda con el operador LIKE
        $campos = array(/* 'pro_codigo', */ 'pro_nombre');

        $alias = array(/* 'pro_codigo' => 'likecodigo', */
            'pro_nombre' => 'liketitulo');

        $orderIndex = array('pro_id' => 'a');

        $index = 1;
        $orderLike = array();
        foreach ($array_no_arts as $palabra) {
            if (strlen($palabra) > 3) {
                $against_words[] = $palabra . '*';
            } else {
                foreach ($campos as $campo) {
                    $likeSelect[] = $db->quoteInto('(' . $campo . ' like ?) as ' . $alias[$campo] . $index, '%' . $palabra . '%');
                    $like[] = $db->quoteInto($campo . ' like ?', '%' . $palabra . '%');
                    $orderLike[$orderIndex[substr($campo, 4)]][] = $alias[$campo] . $index . ' desc ';
                    $index++;
                }
            }
            $index++;
        }

        $against_string = implode($against_words, ' ');
        $against = array();
        $againstSelect = array();
        foreach ($campos as $campo) {
            $againstSelect[] = $db->quoteInto('(match(' . $campo . ') against(? in boolean mode)) as rel_' . substr($campo, 4), $against_string);
            $against[] = $db->quoteInto('match(' . $campo . ') against(? in boolean mode)', $against_string);
        }

        $select = $db->select()
                ->from('gk_productos', array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio', 'pro_estado', 'pro_destacar', 'pro_oferta'))
                ->where('pro_estado <> ?', 2);

        // Campos select con el operador Like
        if (count($likeSelect) > 0) {
            foreach ($likeSelect as $likeItem) {
                $select->from('', $likeItem);
            }
        }

        // Campos select con la busqueda FULLTEXT
        if (count($againstSelect) > 0) {
            foreach ($againstSelect as $againstItem) {
                $select->from('', $againstItem);
            }
        }

        // Where con LIKE
        if (count($like) > 0) {

            $selectLike = '(' . implode(' or ', $like) . ')';
            $selectString = $selectLike;
        }

        // Where con FULLTEXT
        if (count($against) > 0) {

            $selectAgainst = '(' . implode(' or ', $against) . ')';

            if ($selectLike != '') {
                $selectString.=' or ' . $selectAgainst;
            } else {
                $selectString = $selectAgainst;
            }
        }

        $select->where($selectString);

        // Order
        //$select->order('pro_nombre_es desc');

        $productos = $db->fetchAll($select);
        $pager = new Ey_Pager($select, WEB_ROOT . '/admin/productos/busqueda/texto:' . $text[1], Ey::getPrm(4), 50);
        $productos = $pager->query();
        $navegador = $pager->getNavigation();
        
        $busqueda = array();

        foreach ($productos as $row) {

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

            $html2 = '<a class="deta" href="' . WEB_ROOT . '/admin/productos/detalle-producto/' . $row->pro_id . '">
                                              ' . $row->pro_nombre . '</a>';

            $busqueda[] = array('html2' => $html2,
                'imagen' => BASE_WEB_ROOT . '/svc/get-img/productos-pro_' . $row->pro_id . '_small/150:113',
                'descripcion' => Ey::recortar($row->pro_descripcion, 200),
                'precio' => $row->pro_precio,
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
        $smarty->assign('productos', $busqueda);
        $smarty->assign('navigator', $navegador);
        $smarty->assign('total', $pager->recordCount());
        $smarty->assign('titulo', $pager->recordCount() . ' Productos encontrados con la palabra "' . $text[1] . '"');

        if (count($productos) <= 0) {
            $smarty->assign('footermsg', 'La busqueda no obtuvo resultados');
        }

        return $smarty->fetch(ADMIN_PRODUCTOS_DIR . DS . 'tpl' . DS . 'productos.tpl');
    }

}