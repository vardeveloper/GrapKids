<?php

class Web_Admin_Productos_ModificarProducto extends Web_Admin_MainPage
{

    public function mainContent()
    {
        $this->add_js_link('http://code.jquery.com/jquery-latest.js');
        $this->add_js_link(BASE_WEB_ROOT . '/wgt/tiny_mce/tiny_mce.js');
        return $this->actualizar();
    }

    private function actualizar()
    {
        $error = null;
        $post = null;
        
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['post'])) {
            $post = $_SESSION['post'];
            unset($_SESSION['post']);
        }

        $pro_id = Ey::getPrm(3);
        $obj = new Web_Db_Productos();
        $db = $obj->getAdapter();
        $rs = $db->fetchRow($obj->select()->where('pro_id=?', $pro_id));

        $smarty = new Smarty_Engine();
        $smarty->assign('post', $post);
        $smarty->assign('error', $error);
        $smarty->assign('producto', $rs);
        $smarty->assign('tipo', $_SESSION['adm']['adm_tipo']);

        return $smarty->fetch(ADMIN_PRODUCTOS_DIR . DS . 'tpl' . DS . 'modificar-producto.tpl');
    }

}