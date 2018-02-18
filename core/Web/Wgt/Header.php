<?php

class Web_Wgt_Header
{

    public function render()
    {

//        if (!isset($_SESSION['usr'])) {
//            unset($_SESSION['usr']);
//            Ey::redirect(WEB_ROOT);
//        }

        $cantidad = Ey_Carrito::itemsCount();
//        $precioTotal = Ey_Carrito::precioTotal();

        $smarty = new Smarty_Engine();
        $smarty->assign('cantidad', $cantidad);
        $smarty->assign('user', isset($_SESSION['usr']) ? $_SESSION['usr'] : '');
        $smarty->assign('nombre', isset($_SESSION['usr']['cli_nombre']) ? $_SESSION['usr']['cli_nombre'] : '');
        $smarty->assign('apellido', isset($_SESSION['usr']['cli_apellido']) ? $_SESSION['usr']['cli_apellido'] : '');

        return $smarty->fetch(TPL_ROOT . DS . 'wgt-header.tpl');
    }

}
