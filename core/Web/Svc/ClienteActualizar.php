<?php

class Web_Svc_ClienteActualizar
{

    public function doIt()
    {
        $this->enviarformulario();
    }

    private function enviarformulario()
    {
        if ($_POST['nombre'] == '') {
            $error['nombre'] = 'Ingrese nombre';
        }
        if ($_POST['apellido'] == '') {
            $error['apellido'] = 'Ingrese apellido';
        }
        if ($_POST['telefono'] == '') {
            $error['telefono'] = 'Ingrese teléfono';
        }
        if ($_POST['celular'] == '') {
            $error['celular'] = 'Ingrese celular';
        }
        if ($_POST['pais'] == '') {
            $error['pais'] = 'Ingrese país';
        }
        if ($_POST['provincia'] == '') {
            $error['provincia'] = 'Ingrese ciudad';
        }
        if ($_POST['distrito'] == '') {
            $error['distrito'] = 'Ingrese distrito';
        }
        if ($_POST['direccion'] == '') {
            $error['direccion'] = 'Ingrese dirección';
        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::goBack();
        }

        $row = array('cli_empresa' => $_POST['empresa'],
                    'cli_ruc' => $_POST['ruc'],
                    'cli_cargo' => $_POST['cargo'],
                    'cli_nombre' => $_POST['nombre'],
                    'cli_apellido' => $_POST['apellido'],
                    'cli_pais' => $_POST['pais'],
                    'cli_provincia' => $_POST['provincia'],
                    'cli_distrito' => $_POST['distrito'],
                    'cli_direccion' => $_POST['direccion'],
                    'cli_telefono' => $_POST['telefono'],
                    'cli_celular' => $_POST['celular']);
        
        $obj = new Web_Db_Clientes();

        $obj->update($row, 'cli_id=' . $_SESSION['usr']['cli_id']);

        $_SESSION['envio'] = 'Sus datos fueron actualizados satisfactoriamente.';

        Ey::goBack();
    }

}