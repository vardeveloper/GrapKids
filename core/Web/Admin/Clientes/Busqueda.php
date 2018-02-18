<?php

class Web_Admin_Clientes_Busqueda extends Web_Admin_MainPage
{

    public function mainContent()
    {
        parent::add_js_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.js');
        parent::add_css_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.css');

        global $db;

        $criterio = urldecode(Ey::getPrm(3));

        $text = explode(':', $criterio);

        $array_no_arts[] = $text[1];

        $against_words = array();
        $like = array();

        // separar las palabras en dos grupos, las que tienen mas de 3 caracteres
        // de longitud para la busqueda FULLTEXT y las que tienen de menos o igual
        // a tres caracteres para la busqueda con el operador LIKE
        $campos = array('cli_nombre', 'cli_apellido', 'cli_email');

        $alias = array('cli_nombre' => 'likenombre',
            'cli_apellido' => 'likeapellido',
            'cli_email' => 'likeemail');

        $orderIndex = array('cli_id' => 'a');

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
                ->from('gk_clientes', array('cli_id', 'cli_estado', 'cli_nombre', 'cli_apellido', 'cli_email', 'cli_telefono', 'cli_celular'))
                ->where('cli_estado <> ?', 2);

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
        //$select->order('cli_apellido');
//        $clientes = $db->fetchAll($select);

        $pager = new Ey_Pager($select, BASE_WEB_ROOT . '/admin/clientes/busqueda', Ey::getPrm(3), 50);
        $clientes = $pager->query();
        $navegador = $pager->getNavigation();
        $numeroReg = $pager->recordCount();

        $user = array();
        
        foreach ($clientes as $item) {

            if ($sw == 1) {
                $bgcolor = 'second';
                $sw = 0;
            } else {
                $bgcolor = 'first';
                $sw = 1;
            }
            if ($item->cli_estado != 1) {
                $bloquear = '<a href="' . WEB_ROOT . '/admin/clientes/svc/activar-cliente/' . $item->cli_id . '/1" title="Inactivo" >
                                        <img src="' . WEB_ROOT . '/img/admin/inactive.png" alt="" /></a>';
            } else {
                $bloquear = '<a href="' . WEB_ROOT . '/admin/clientes/svc/activar-cliente/' . $item->cli_id . '/0" title="Activo" >
                                        <img src="' . WEB_ROOT . '/img/admin/active.png" alt="" /></a>';
            }

            $eliminar = '<a href="' . WEB_ROOT . '/admin/clientes/svc/delete-cliente/' . $item->cli_id . '" title="Eliminar" class="adm_alert_delete" >
                                    <img src="' . WEB_ROOT . '/img/admin/delete.png" alt="Eliminar" /></a>';

            $verpedido = Ey::crearBoton(WEB_ROOT . '/admin/pedidos/main/' . $item->cli_id, 'Pedidos', 'adm_btn_ok');

            $html2 = '<a href="' . WEB_ROOT . '/admin/clientes/detalle-cliente/' . $item->cli_id . '">
                                              ' . ucwords(strtolower($item->cli_apellido)) . ', ' . ucwords(strtolower($item->cli_nombre)) . '</a>';

            $user[] = array('id' => $item->cli_id,
                'html2' => $html2,
                'telefono' => $item->cli_telefono,
                'celular' => $item->cli_celular,
                'email' => $item->cli_email,
                'estado' => $item->cli_estado,
                'verpedido' => $verpedido,
                'bloquear' => $bloquear,
                'eliminar' => $eliminar,
                'bgcolor' => $bgcolor);
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('usuarios', $user);
        $smarty->assign('navegacion', $navegador);
        $smarty->assign('titulo', $numeroReg . ' Clientes encontrados con la palabra "' . $text[1] . '"');

        if (count($clientes) <= 0) {
            $smarty->assign('footermsg', 'La busqueda no obtuvo resultados');
        }

        return $smarty->fetch(ADMIN_CLIENTES_DIR . DS . 'tpl' . DS . 'clientes.tpl');
    }

}