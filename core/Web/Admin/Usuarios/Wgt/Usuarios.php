<?php

class Web_Admin_Usuarios_Wgt_Usuarios
{

//    public function __construct($context)
//    {
//        $context->add_css_link(BASE_WEB_ROOT . '/css/navega.css');
//        $context->add_js_link(BASE_WEB_ROOT . '/js/admin/jquery.js');
//        $context->add_js_link(BASE_WEB_ROOT . '/js/admin/jquery.tablesorter.js');
//        $context->add_js_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.js');
//        $context->add_css_link(BASE_WEB_ROOT . '/wgt/alertbox/sexyalertbox.css');
//    }

    public function render()
    {
        return $this->_getUsuarios();
    }

    private function _getUsuarios()
    {
        Ey::addConfig('activemenu', Ey::getPrm(1));

        $obj = new Web_Db_Admin();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from('gk_admin', array('adm_id', 'adm_user', 'adm_apellido', 'adm_nombre', 'adm_email', 'adm_estado', 'adm_tipo'))
                ->order('adm_id');

        $pager = new Ey_Pager($select, WEB_ROOT . '/admin/usuarios/main', Ey::getPrm(3), 15);
        $rows = $pager->fetchAll();
        $navegador = $pager->getNavigation();
        
//        print_r($rows);
        
        $user = array();
        $sw = null;

        foreach ($rows as $item) {
            if ($sw == 1) {
                $bgcolor = 'second';
                $sw = 0;
            } else {
                $bgcolor = 'first';
                $sw = 1;
            }
            if ($item->adm_estado != 1) {
                $bloquear = Ey::crearBoton(WEB_ROOT . '/admin/usuarios/svc/activar-usuario/' . $item->adm_id . '/1', 'Activar', 'adm_btn_ok');

                $img = '<img src="' . WEB_ROOT . '/img/admin/locked.gif" width="17" height="16" title="Usuario Bloqueado"/>';
            } else {
                $bloquear = Ey::crearBoton(WEB_ROOT . '/admin/usuarios/svc/activar-usuario/' . $item->adm_id . '/0', 'Bloquear', 'adm_btn_alert');

                $img = '<img src="' . WEB_ROOT . '/img/admin/check.gif" width="12" height="12" title="Usuario Activo"/>';
            }
            $modificar = Ey::crearBoton(WEB_ROOT . '/admin/usuarios/actualizar-usuario/' . $item->adm_id, 'Modificar', 'adm_btn_ok');

            $eliminar = Ey::crearBoton(WEB_ROOT . '/admin/usuarios/svc/delete-usuario/' . $item->adm_id, 'Eliminar', 'adm_btn_alert adm_alert_delete');

            $user[] = array('id' => $item->adm_id,
                'nombre' => $item->adm_apellido . ', ' . $item->adm_nombre,
                'user' => strtoupper($item->adm_user),
                'email' => $item->adm_email,
                'tipo' => $item->adm_tipo,
                'img' => $img,
                'bloquear' => $bloquear,
                'modificar' => $modificar,
                'eliminar' => $eliminar,
                'bgcolor' => $bgcolor);
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('usuarios', $user);
        $smarty->assign('navegacion', $navegador);

        if (count($rows) <= 0) {
            $smarty->assign('footermsg', 'Aun no se han creado Usuarios');
        }

        return $smarty->fetch(ADMIN_USUARIOS_DIR . DS . 'tpl' . DS . 'usuarios.tpl');
    }

}

