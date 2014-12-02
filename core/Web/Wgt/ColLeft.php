<?php

class Web_Wgt_ColLeft
{

    public function render()
    {
        global $db;
        
        $categorias = $db->fetchAll($db->select()
                                ->from('gk_categorias', array('cat_nombre', 'cat_key'))
                                ->where('cat_estado=?', 1)
                                ->where('cat_padre_id=?', 0)
                                ->order('cat_nombre'));
//        print_r($categorias);
//        
//        $subcategorias = $db->fetchAll($db->select()
//                                ->from('gk_categorias')
//                                ->where('cat_estado=?', 1)
//                                ->where('cat_padre_id!=?', 0));

        $smarty = new Smarty_Engine();
        $smarty->assign('categorias', $categorias);
//        $smarty->assign('subcategorias', $subcategorias);

        return $smarty->fetch(TPL_ROOT . DS . 'wgt-col-left.tpl');
    }

}