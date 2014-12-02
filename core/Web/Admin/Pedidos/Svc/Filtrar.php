<?php

class Web_Admin_Pedidos_Svc_Filtrar
{
    
    public function doIt()
    {
        if (empty($_POST['cli_day1']) && empty($_POST['cli_day2']) && empty($_POST['cli_day3'])) {
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        if (empty($_POST['anio']) && empty($_POST['mes']) && empty($_POST['dia'])) {
            Ey::redirect($_SERVER['HTTP_REFERER']);
        }

        $fecha = $_POST['cli_day3'] . '-' . $_POST['cli_day2'] . '-' . $_POST['cli_day1'];
        $date = new Zend_Date($fecha);

        $fechaTo = $_POST['anio'] . '-' . $_POST['mes'] . '-' . $_POST['dia'];
        $dateTo = new Zend_Date($fechaTo);

        Ey::redirect(WEB_ROOT . '/admin/pedidos/buscar-fecha/' . $date->get() . '/' . $fecha . '/' . $dateTo->get() . '/' . $fechaTo);
    }

}