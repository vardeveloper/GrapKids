<?php

class Web_Admin_Usuarios_Svc_GuardarUsuario
{

    public function doIt()
    {
        $this->guardar();
    }

    public function guardar()
    {
        $obj = new Web_Db_Admin();
        
        $rs = $obj->fetchRow($obj->select()
                                ->where('adm_email=?', $_POST['adm_email']));

        $rs2 = $obj->fetchRow($obj->select()
                                ->where('adm_user=?', $_POST['adm_user']));

        if ($_POST['adm_nombre'] == '') {
            $error['adm_nombre'] = 'Ingrese su Nombre';
        }
        if ($_POST['adm_apellido'] == '') {
            $error['adm_apellido'] = 'Ingrese su Apellido';
        }
        if ($_POST['adm_email'] == '') {
            $error['adm_email'] = 'Ingrese su Email';
        } else {
            $validator = new Zend_Validate_EmailAddress();
            if (!$validator->isValid(Ey::getPost('adm_email'))) {
                $error['adm_email'] = 'El Email no es valido';
            } else {
                if (count($rs) > 0) {
                    $error['adm_email'] = 'El Email ya se ha registrado';
                }
            }
        }
        if ($_POST['adm_user'] == '') {
            $error['adm_user'] = 'Ingrese su usuario';
        } else {
            if (count($rs2) > 0) {
                $error['adm_user'] = 'El Usuario ya se ha registrado';
            }
        }
        if ($_POST['adm_pass'] == '') {
            $error['adm_pass'] = 'Ingrese su Contraseña';
        }
        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $row = array('adm_nombre' => $_POST['adm_nombre'],
            'adm_apellido' => $_POST['adm_apellido'],
            'adm_email' => $_POST['adm_email'],
            'adm_estado' => 1,
            'adm_user' => $_POST['adm_user'],
            'adm_fecha' => date('Y-m-d'),
            'adm_tipo' => $_POST['adm_tipo'],
            'adm_pass' => Ey::encrypt($_POST['adm_pass']));

        $obj->insert($row);

        $id = $obj->getAdapter()->lastInsertId();

        if ($_POST['adm_tipo'] == 'usuario') {
            $obj2 = new Web_Db_Privilegios();
            for ($i = 1; $i <= 8; $i++) {
                if ($_POST['pri_' . $i] != '') {
                    $row2 = array('mod_modulo' => $_POST['pri_' . $i],
                        'mod_id_admin' => $id);
                    $obj2->insert($row2);
                }
            }
        }

        Ey::redirect(WEB_ROOT . '/admin/usuarios');
    }

}