<?php

class Web_Busqueda extends Web_BasePage 
{

    public function mainContent() 
    {
        return $this->buscar();
    }

    function buscar() 
    {
        parent::set_title('Busqueda de Productos | Grap Kids');
        
        global $db;

        $criterio = urldecode(Ey::getPrm(1));
        $text = explode(':', $criterio);
        $array_no_arts[] = $text[1];
        $against_words = array();
        $like = array();

        // separar las palabras en dos grupos, las que tienen mas de 3 caracteres
        // de longitud para la busqueda FULLTEXT y las que tienen de menos o igual
        // a tres caracteres para la busqueda con el operador LIKE
        $campos = array('pro_nombre');
        $alias = array('pro_nombre' => 'liketitulo');
        $orderIndex = array('pro_nombre' => 'a');

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
                        ->from('gk_productos', array('pro_nombre', 'pro_key', 'pro_id', 'pro_precio'))
                        ->where('pro_estado<>?', 2);

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

        $pager = new Ey_Pager($select, WEB_ROOT . '/busqueda/' . $criterio, Ey::getPrm(2), 15);
        $productos = $pager->fetchAll();
        $navegador = $pager->getNavigation();
        $numeroReg = $pager->recordCount();  

        foreach ($productos as $producto) {
            $producto->imagen = BASE_WEB_ROOT . '/svc/get-img/productos-pro_' . $producto->pro_id . '_m';
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('navigator', $navegador);
        $smarty->assign('productos', $productos);
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());
        $smarty->assign('titulo', $numeroReg . ' Productos encontrados con la palabra "' . $text[1] . '"');

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'busqueda.tpl');
    }

}