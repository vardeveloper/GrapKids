<?php

class Web_Admin_Categorias_ProductoRelacion extends Web_Admin_MainPage
{

    public function mainContent()
    {
        $this->add_js_link('http://code.jquery.com/jquery-latest.js');
        return $this->insertar();
    }

    private function insertar()
    {
        $pro_id = Ey::getPrm(3);
        
        $error = null;

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }

        $obj = new Web_Db_Categorias();
        $db = $obj->getAdapter();
        $cats = $db->fetchAll($obj->select()
                                    ->order('cat_nombre')
                                    ->where('cat_padre_id=?', 0)
                                    ->where('cat_estado<>?', 2));
        
        $html = '';
        foreach ($cats as $cat) {
            $html.='<option value="' . $cat->cat_id . '">' . $cat->cat_nombre . '</option>';
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('error', $error);
        $smarty->assign('html', $html);
        $smarty->assign('pro_id', $pro_id);

        return $smarty->fetch(ADMIN_CATEGORIAS_DIR . DS . 'tpl' . DS . 'insertar-relacion.tpl');
    }

}