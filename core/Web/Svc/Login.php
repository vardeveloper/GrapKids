<?php

class Web_Svc_Login
{

    public function doIt()
    {
        if ($_POST['uuser'] == '') {
            $error['uuser'] = "Ingrese Email";
        } else {
            $validator = new Zend_Validate_EmailAddress();
            if (!$validator->isValid(Ey_Util::getPost('uuser'))) {
                $error['uuser'] = 'Ingrese un Email valido';
            }
        }
        if ($_POST['upass'] == '') {
            $error['upass'] = "Ingrese Contraseña";
        }
        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::goBack();
        }

        $obj = new Web_Db_Clientes();

        if (Ey_Login::doLogin('cli_email', 'cli_pass', $obj, array(), 'usr', $_POST['uuser'], $_POST['upass'], $isFunction = true)) {
//            unset($_SESSION['usr']);
//            Ey::goBack();
            Ey::redirect(WEB_ROOT . '/mi-carrito');
        } else {
            $error['upass'] = "<br/>El email o contraseña no es correcto.";
            $_SESSION['error'] = $error;
            Ey::redirect($_SERVER[HTTP_REFERER]);
        }
    }

}