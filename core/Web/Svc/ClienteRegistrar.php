<?php

class Web_Svc_ClienteRegistrar
{

    public function doIt()
    {
        $this->enviarformulario();
    }

    private function enviarformulario()
    {
        $obj = new Web_Db_Clientes();
        $rs = $obj->fetchRow($obj->select()
                        ->where('cli_email=?', $_POST['email']));

        if ($_POST['nombre'] == '') {
            $error['nombre'] = 'Ingrese nombre';
        }

        if ($_POST['apellido'] == '') {
            $error['apellido'] = 'Ingrese apellido';
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

        if ($_POST['telefono'] == '') {
            $error['telefono'] = 'Ingrese teléfono';
        }

        if ($_POST['celular'] == '') {
            $error['celular'] = 'Ingrese celular';
        }

        if ($_POST['email'] == '') {
            $error['email'] = 'Ingrese email';
        } else {
            $validator = new Zend_Validate_EmailAddress();
            if (!$validator->isValid(Ey_Util::getPost('email'))) {
                $error['email'] = 'Ingrese un Email valido';
            } else {
                if (count($rs) > 0) {
                    $error['email'] = '<br /> El Email ya se ha registrado';
                }
            }
        }

        if ($_POST['pass'] == '') {
            $error['pass'] = '<br /> Ingrese contraseña';
        } elseif (strlen($_POST['pass']) < 6) {
            $error['pass'] = '<br /> Ingrese mínimo 6 caracteres';
        } elseif ($_POST['repass'] == '') {
            $error['repass'] = '<br /> Ingrese la misma contraseña';
        } elseif ($_POST['pass'] != $_POST['repass']) {
            $error['repass'] = '<br /> La contraseña no es igual';
        }

        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::goBack();
        }

        if ($_POST['boletin'] == 'SI') {
            $obj2 = new Web_Db_Boletin();
            $row2 = array('bol_email' => $_POST['email']);
            $obj2->insert($row2);
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
            'cli_celular' => $_POST['celular'],
            'cli_email' => $_POST['email'],
            'cli_pass' => Ey::encrypt($_POST['pass']),
            'cli_fecha' => date('Y-m-d H:i:s'),
            'cli_estado' => 1);
        
        $obj->insert($row);


        $html = '';
        $html.='<table style="font:14px/22px \'Trebuchet MS\',Arial,Helvetica,sans-serif">';
        $html.='<tr><td><b>Email : </b></td><td>' . $_POST['email'] . '</td></tr>';
        $html.='<tr><td><b>Password : </b></td><td>' . $_POST['pass'] . '</td></tr>';
        $html.='</table>';

        $view = new Smarty_Engine();
        $view->assign('html', $html);

        $message_body = Ey::utfToIso($view->fetch(APP_ROOT . DS . 'tpl' . DS . 'mail-registro.tpl'));

        $mail = new Zend_Mail();
        $mail->setFrom('grapkids@gmail.com', 'GRAP KIDS');
        $mail->setSubject(Ey::utfToIso('Registro Cliente'));
        $mail->setBodyHtml($message_body);
        $mail->addTo($_POST['email']);
//        $mail->addBcc('grap_kids@hotmail.com');
        $mail->send();
        

        /*      Loquemos al Usuario Nuevo      */
//        $obj = new Web_Db_Clientes();
        if (Ey_Login::doLogin('cli_email', 'cli_pass', $obj, array(), 'usr', $_POST['email'], $_POST['pass'], $isFunction = true)) {
            Ey::redirect(WEB_ROOT . '/mi-carrito');
        }
    }

}
