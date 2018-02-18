<?php

class Web_Admin_Clientes_Svc_ActualizarCliente
{

    public function doIt()
    {
        $this->guardar();
    }

    public function guardar()
    {
        if ($_POST['nombre'] == "") {
            $error['nombre'] = "Ingrese su Nombre";
        }
        if ($_POST['apellido'] == "") {
            $error['apellido'] = "Ingrese su Apellido";
        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $obj = new Web_Db_Clientes();

        $row = array('cli_nombre' => $_POST['nombre'],
                     'cli_apellido' => $_POST['apellido'],
                     'cli_empresa' => $_POST['empresa'],
                     'cli_ruc' => $_POST['ruc'],
                     'cli_cargo' => $_POST['cargo'],
                     'cli_pais' => $_POST['pais'],
                     'cli_provincia' => $_POST['ciudad'],
                     'cli_distrito' => $_POST['distrito'],
                     'cli_telefono' => $_POST['fono'],
                     'cli_celular' => $_POST['celu']);

        $obj->update($row, 'cli_id=' . $_POST['id']);

        Ey::redirect(BASE_WEB_ROOT . "/admin/clientes");
    }

}