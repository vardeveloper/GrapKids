<?php

class Web_Svc_EnviarContactenos
{

    public function doIt()
    {
        $this->enviarformulario();
    }

    private function enviarformulario()
    {
        if ($_POST['nombre'] == '') {
            $error['total'] = '<div class="ad3">Complete correctamente la información.</div>';
        }
        if ($_POST['email'] == '') {
            $error['total'] = '<div class="ad3">Complete correctamente la información.</div>';
        } else {
            $validator = new Zend_Validate_EmailAddress();
            if (!$validator->isValid(Ey_Util::getPost('email'))) {
                $error['total'] = '<div class="ad3">Ingrese un Email valido</div>';
            }
        }
        if ($_POST['telefono'] == '') {
            $error['total'] = '<div class="ad3">Complete correctamente la información.</div>';
        }
        if ($_POST['mensaje'] == '') {
            $error['total'] = '<div class="ad3">Complete correctamente la información.</div>';
        }
        if (count($error) > 0) {
            $_SESSION['post'] = $_POST;
            $_SESSION['error'] = $error;
            Ey::goBack();
        }

        $comentario = stripslashes($_POST['mensaje']);
        $dar_enters = str_replace("\n", "<br>", $comentario);
        $dar_espacops = str_replace(" ", "&nbsp; ", $dar_enters);
        $comentario_ok = $dar_espacops;

        $_POST['mensaje'] = $comentario_ok;

        $html = '';
        $html.='<table style="font:14px/22px \'Trebuchet MS\',Arial,Helvetica,sans-serif">';
        foreach ($_POST as $key => $value) {
            if ($key != 'button') {
                $html.='<tr><td width="150"><b>' . ucwords($key) . '</b> : </td><td width="450">' . $value . '</td></tr>';
            }
        }
        $html.='</table>';

        $smarty = new Smarty_Engine();
        $smarty->assign('html', $html);
        $message_body = Ey::utfToIso($smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'mail-contactenos.tpl'));

        $mail = new Zend_Mail();
        $mail->setBodyHtml($message_body);
        $mail->setFrom('grapkids@gmail.com', 'GRAP KIDS');
        $mail->addTo('grap_kids@hotmail.com');
//        $mail->addBcc('grap_kids@hotmail.com');
        $mail->setSubject(Ey::utfToIso('Contacto'));
        $mail->send();

        $_SESSION['envio'] = '<div class="ad1">Su información se ha enviado con éxito.</div>';

        Ey::goBack();
    }

}