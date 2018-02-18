<?php

class Web_Admin_Productos_EliminarProducto extends Web_Admin_MainPage
{

    public function mainContent()
    {
        parent::add_js_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.js');
        parent::add_css_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.css');
        return $this->lista();
    }

    private function lista()
    {
        Ey::addConfig('activemenu', Ey::getPrm(1));

        $obj = new Web_Db_Productos();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from('gk_productos', array('pro_id', 'pro_nombre', 'pro_descripcion', 'pro_precio'))
                ->order('pro_id desc')
                ->where('pro_estado=?', 2);

        $pager = new Ey_Pager($select, WEB_ROOT . '/admin/productos/eliminar-producto', Ey::getPrm(3), 15);
        $rows = $pager->fetchAll();
        $navegador = $pager->getNavigation();

        if (!is_null($rows)) {

            $productos = array();

            foreach ($rows as $row) {

                if ($sw == 1) {
                    $bgcolor = 'second';
                    $sw = 0;
                } else {
                    $bgcolor = 'first';
                    $sw = 1;
                }

                $eliminar = Ey::crearBoton(WEB_ROOT . '/admin/productos/svc/eliminar-producto/' . $row->pro_id, 'Eliminar', 'adm_btn_alert adm_alert_delete');

                $restaurar = Ey::crearBoton(WEB_ROOT . '/admin/productos/svc/bloquear-producto/' . $row->pro_id . '/1', 'Restaurar', 'adm_btn_ok');

                $html2 = '<a class="deta" href="' . WEB_ROOT . '/admin/productos/detalle-producto/' . $row->pro_id . '">' . $row->pro_nombre . '</a>';

                $productos[] = array('id' => $row->pro_id,
                    'html2' => $html2,
                    'titulo' => $row->pro_nombre,
                    'descripcion' => Ey::recortar($row->pro_descripcion, 200),
                    'precio' => number_format($row->pro_precio, 2, '.', ','),
                    'eliminar' => $eliminar,
                    'restaurar' => $restaurar,
                    'bgcolor' => $bgcolor);
            }

            $smarty = new Smarty_Engine();
            $smarty->assign('productos', $productos);
            $smarty->assign('navigator', $navegador);
            $smarty->assign('total', $pager->recordCount());

            if (count($rows) <= 0) {
                $smarty->assign('footermsg', 'Aun no se han eliminado Productos');
            }

            return $smarty->fetch(ADMIN_PRODUCTOS_DIR . DS . 'tpl' . DS . 'eliminar-producto.tpl');
        }
    }

}