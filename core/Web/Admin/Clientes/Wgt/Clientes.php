<?php

class Web_Admin_Clientes_Wgt_Clientes
{

//    public function __construct($context) 
//    {
//        $context->add_css_link(BASE_WEB_ROOT . '/css/navega.css');
//        $context->add_js_link(BASE_WEB_ROOT . '/js/jquery.js');
//    }

    public function render()
    {
        return $this->_getUsuarios();
    }

    private function _getUsuarios()
    {
        Ey::addConfig('activemenu', Ey::getPrm(1));

        $obj = new Web_Db_Clientes();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from('gk_clientes', array('cli_id', 'cli_estado', 'cli_nombre', 'cli_apellido', 'cli_email', 'cli_telefono', 'cli_celular'))
                ->where('cli_estado!=?', 2)
                ->order('cli_id DESC');

        $pager = new Ey_Pager($select, WEB_ROOT . '/admin/clientes/main', Ey::getPrm(3), 50);
        $rows = $pager->fetchAll();
        $navegador = $pager->getNavigation();
        
        $user = array();

        foreach ($rows as $item) {

            if ($sw == 1) {
                $bgcolor = 'second';
                $sw = 0;
            } else {
                $bgcolor = 'first';
                $sw = 1;
            }

//            if ($item->cli_estado != 1) {
//                $bloquear = '<a href="' . WEB_ROOT . '/admin/clientes/svc/activar-cliente/' . $item->cli_id . '/1" title="Inactivo" >
//                                        <img src="' . WEB_ROOT . '/img/admin/inactive.png" alt="Inactivo" /></a>';
//            } else {
//                $bloquear = '<a href="' . WEB_ROOT . '/admin/clientes/svc/activar-cliente/' . $item->cli_id . '/0" title="Activo" >
//                                        <img src="' . WEB_ROOT . '/img/admin/active.png" alt="Activo" /></a>';
//            }
            
            $actualizar = '<a href="' . WEB_ROOT . '/admin/clientes/actualizar-cliente/' . $item->cli_id . '" title="Editar" >
                                        <img src="' . WEB_ROOT . '/img/admin/edit.png" width="16" height="16" alt="Editar" /></a>';

            $eliminar = '<a href="' . WEB_ROOT . '/admin/clientes/svc/delete-cliente/' . $item->cli_id . '" title="Eliminar" class="adm_alert_delete" >
                                    <img src="' . WEB_ROOT . '/img/admin/delete.png" alt="Eliminar" /></a>';

            $verpedido = Ey::crearBoton(WEB_ROOT . '/admin/pedidos/main/' . $item->cli_id, 'Pedidos', 'adm_btn_ok');

            $html2 = '<a class="deta" href="' . WEB_ROOT . '/admin/clientes/detalle-cliente/' . $item->cli_id . '">
                                              ' . ucwords(strtolower($item->cli_apellido)) . ', ' . ucwords(strtolower($item->cli_nombre)) . '</a>';

            $user[] = array('id' => $item->cli_id,
                            'html2' => $html2,
                            'telefono' => $item->cli_telefono,
                            'celular' => $item->cli_celular,
                            'email' => $item->cli_email,
                            'estado' => $item->cli_estado,
                            'verpedido' => $verpedido,
                            'actualizar' => $actualizar,
                            'eliminar' => $eliminar,
                            'bgcolor' => $bgcolor);
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('usuarios', $user);
        $smarty->assign('navegacion', $navegador);
        $smarty->assign('total', $pager->recordCount());
        $smarty->assign('tipo', $_SESSION['adm']['adm_tipo']);

        if (count($rows) <= 0) {
            $smarty->assign('footermsg', 'Aun no se han creado Clientes');
        }

        return $smarty->fetch(ADMIN_CLIENTES_DIR . DS . 'tpl' . DS . 'clientes.tpl');
    }

}

