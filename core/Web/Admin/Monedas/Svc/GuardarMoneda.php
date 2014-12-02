<?php

class Web_Admin_Monedas_Svc_GuardarMoneda {

    public function doIt() {
        $this->guardar();
    }

    public function guardar() {
        if ($_POST['mon_nombre'] == "") {
            $error['mon_nombre'] = "Ingrese un Nombre";
        }
        if ($_POST['mon_simbolo'] == "") {
            $error['mon_simbolo'] = "Ingrese un Simbolo";
        }
        if ($_POST['mon_valor'] == '') {
            $error['mon_valor'] = "Ingrese un valor";
        } elseif (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $_POST['mon_valor'])) {
            $error['mon_valor'] = "Solo el formato (0.00)";
        }
        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        global $db;

        $row = array('mon_nombre' => $_POST['mon_nombre'],
                    'mon_simbolo' => $_POST['mon_simbolo'],
                    'mon_valor' => 1 / $_POST['mon_valor'],
                    'mon_key' => Ey::UrlAmigable($_POST['mon_nombre']),
                    'mon_estado' => 1);

        $db->insert('gk_moneda', $row);

        $_SESSION['enviado'] = '<script language="javascript1.2">
		alert("Los Datos se Han Ingresado Exitosamente");
		</script>';

        Ey::redirect(BASE_WEB_ROOT . "/admin/monedas");
    }

}