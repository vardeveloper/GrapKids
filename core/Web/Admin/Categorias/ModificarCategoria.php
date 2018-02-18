<?php

class Web_Admin_Categorias_ModificarCategoria extends Web_Admin_MainPage
{

    public function mainContent()
    {
        return $this->actualizar();
    }

    private function actualizar()
    {
        $cat_id = Ey::getPrm(3);
        $obj = new Web_Db_Categorias();
        $db = $obj->getAdapter();
        $rs = $db->fetchRow($obj->select()
                                ->where('cat_id=?', $cat_id));
//        print_r($rs);

        $smarty = new Smarty_Engine();
        $smarty->assign('categoria', $rs);

        return $smarty->fetch(ADMIN_CATEGORIAS_DIR . DS . 'tpl' . DS . 'modificar-categoria.tpl');
    }

}