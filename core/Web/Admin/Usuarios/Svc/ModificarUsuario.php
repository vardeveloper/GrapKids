<?php

class Web_Admin_Usuarios_Svc_ModificarUsuario
{

    public function doIt()
    {
        $this->guardar();
    }

    public function guardar()
    {
        if ($_POST['adm_nombre'] == "") {
            $error['adm_nombre'] = "Ingrese su Nombre";
        }
        if ($_POST['adm_apellido'] == "") {
            $error['adm_apellido'] = "Ingrese su Apellido";
        }
        if ($_POST['adm_email'] == "") {
            $error['adm_email'] = "Ingrese su Email";
        }
        if ($_POST['adm_user'] == "") {
            $error['adm_user'] = "Ingrese su usuario";
        }
        if ($_POST['adm_pass'] == "") {
            $error['adm_pass'] = "Ingrese su Contraseña";
        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $obj = new Web_Db_Admin();

        $row = array('adm_nombre' => $_POST['adm_nombre'],
            'adm_apellido' => $_POST['adm_apellido'],
            'adm_email' => $_POST['adm_email'],
            'adm_pass' => Ey::encrypt($_POST['adm_pass']),
            'adm_user' => $_POST['adm_user']);

        $obj->update($row, 'adm_id=' . $_POST['adm_id']);

        Ey::redirect(BASE_WEB_ROOT . "/admin/usuarios");
    }

}