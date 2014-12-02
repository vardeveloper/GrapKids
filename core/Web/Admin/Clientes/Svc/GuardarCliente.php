<?php

class Web_Admin_Clientes_Svc_GuardarCliente
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
        if ($_POST['email'] == '') {
            $error['email'] = 'Ingrese email';
        } else {
            $validator = new Zend_Validate_EmailAddress();
            if (!$validator->isValid(Ey_Util::getPost('email'))) {
                $error['email'] = 'Ingrese un Email valido';
            } else {
                if (count($rs) > 0) {
                    $error['email'] = '<br />El Email ya se ha registrado';
                }
            }
        }
        
        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::goBack();
        }
        
        $aleatorio = mt_rand(1, 9999);
        
        $clave = $_POST['nombre'] . '' . $aleatorio;

        $row = array('cli_nombre' => $_POST['nombre'],
            'cli_apellido' => $_POST['apellido'],
            'cli_email' => $_POST['email'],
            'cli_pass' => Ey::encrypt($clave),
            'cli_fecha' => date('Y-m-d H:i:s'),
            'cli_estado' => 1);

        $obj->insert($row);

        /*     AL USUARIO      */

        $html = '';
        $html.='<table style="font:16px/22px \'Trebuchet MS\',Arial,Helvetica,sans-serif">';
        $html.='<tr><td><b>Email : </b></td><td>' . $_POST['email'] . '</td></tr>';
        $html.='<tr><td><b>Password : </b></td><td>' . $clave . '</td></tr>';
        $html.='</table>';

        $view = new Smarty_Engine();
        $view->assign('html', $html);

        $message_body = Ey::utfToIso($view->fetch(APP_ROOT . DS . 'tpl' . DS . 'mail-registro.tpl'));

        $mail = new Zend_Mail();
        $mail->setFrom('grapkids@gmail.com', 'GRAP KIDS');
        $mail->setSubject(Ey::utfToIso('Registro Cliente'));
        $mail->setBodyHtml($message_body);
        $mail->addTo($_POST['email']);
        $mail->send();
        

        Ey::redirect(WEB_ROOT . '/admin/clientes');
    }

}