<?php

class Web_Admin_Productos_DetalleProducto extends Web_Admin_MainPage
{

    public function mainContent()
    {
        parent::add_js_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.js');
        parent::add_css_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.css');
        return $this->detalle();
    }

    private function detalle()
    {
        $pro_id = Ey::getPrm(3);
        $obj = new Web_Db_Productos();
        $db = $obj->getAdapter();
        $rs = $db->fetchRow($obj->select()
                                ->from('gk_productos', array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio'))
                                ->where('pro_id=?', $pro_id));
//        print_r($rs);

        /* Codigo de las imagenes */
        $file1 = 'pro_' . $rs->pro_id . '_1.jpg';
        $file2 = 'pro_' . $rs->pro_id . '_2.jpg';
        $file3 = 'pro_' . $rs->pro_id . '_3.jpg';
        $file4 = 'pro_' . $rs->pro_id . '_4.jpg';
        $file5 = 'pro_' . $rs->pro_id . '_5.jpg';
        $file6 = 'pro_' . $rs->pro_id . '_6.jpg';

        /* Dirección y nombre del archivo */
        $filename1 = APP_ROOT . DS . '_data' . DS . 'img' . DS . 'productos' . DS . $file1;
        $filename2 = APP_ROOT . DS . '_data' . DS . 'img' . DS . 'productos' . DS . $file2;
        $filename3 = APP_ROOT . DS . '_data' . DS . 'img' . DS . 'productos' . DS . $file3;
        $filename4 = APP_ROOT . DS . '_data' . DS . 'img' . DS . 'productos' . DS . $file4;
        $filename5 = APP_ROOT . DS . '_data' . DS . 'img' . DS . 'productos' . DS . $file5;
        $filename6 = APP_ROOT . DS . '_data' . DS . 'img' . DS . 'productos' . DS . $file6;
        
        $img1 = null;
        $img2 = null;
        $img3 = null;
        $img4 = null;
        $img5 = null;
        $img6 = null;
        
        if (file_exists($filename1)) {
            $img1 = true;
        }
        if (file_exists($filename2)) {
            $img2 = true;
        }
        if (file_exists($filename3)) {
            $img3 = true;
        }
        if (file_exists($filename4)) {
            $img4 = true;
        }
        if (file_exists($filename5)) {
            $img5 = true;
        }
        if (file_exists($filename6)) {
            $img6 = true;
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('tipo', $_SESSION['adm']['adm_tipo']);
        $smarty->assign('producto', $rs);
        $smarty->assign('img1', $img1);
        $smarty->assign('img2', $img2);
        $smarty->assign('img3', $img3);
        $smarty->assign('img4', $img4);
        $smarty->assign('img5', $img5);
        $smarty->assign('img6', $img6);

        return $smarty->fetch(ADMIN_PRODUCTOS_DIR . DS . 'tpl' . DS . 'detalle-producto.tpl');
    }

}