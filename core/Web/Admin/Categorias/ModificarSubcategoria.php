<?php

class Web_Admin_Categorias_ModificarSubcategoria extends Web_Admin_MainPage
{

    public function mainContent()
    {
        return $this->actualizar();
    }

    private function actualizar()
    {
        $sub_id = Ey::getPrm(3);
        $obj = new Web_Db_Categorias();
        $db = $obj->getAdapter();
        $rs = $db->fetchRow($obj->select()
                                ->where('cat_id=?', $sub_id));
//        print_r($rs);

        $cats = $db->fetchAll($obj->select()
                                ->order('cat_nombre')
                                ->where('cat_padre_id=?', 0)
                                ->where('cat_estado!=?', 2));

        $html = '';
        foreach ($cats as $cat) {
            if ($rs->cat_padre_id == $cat->cat_id) {
                $html.='<option selected="selected" value="' . $cat->cat_id . '">' . $cat->cat_nombre . '</option>';
            } else {
                $html.='<option value="' . $cat->cat_id . '">' . $cat->cat_nombre . '</option>';
            }
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('sub', $rs);
        $smarty->assign('html', $html);

        return $smarty->fetch(ADMIN_CATEGORIAS_DIR . DS . 'tpl' . DS . 'modificar-subcategoria.tpl');
    }

}