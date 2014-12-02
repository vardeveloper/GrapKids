<?php

class Web_Svc_ForgotPasswd
{

    public function doIt()
    {
        $this->enviarPass();
    }

    private function enviarPass()
    {
        $email = $_POST['email'];
        if ($this->notify_password($email)) {
            $_SESSION['forgotPass'] = "Tu Contraseña ha sido enviada a tu dirección email.";
        } else {
            $_SESSION['forgotPass'] = "Tu contraseña no ha podido ser enviada por email.";
        }
        Ey::goBack();
    }

    private function notify_password($email)
    {
        $obj = new Web_Db_Clientes();
        $rs = $obj->fetchRow($obj->select()
                                ->where('cli_email=?', $email));

        if (count($rs) == 0)
            return false;
        else {
            $smarty = new Smarty_Engine();
            $smarty->assign('usuario', ($rs->cli_nombre . ' ' . $rs->cli_apellido));
            $smarty->assign('pass', Ey::decrypt($rs->cli_pass));
            $mailMessage = Ey::utfToIso($smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'mail-login.tpl'));

            $mail = new Zend_Mail();
            $mail->setBodyHtml($mailMessage);
            $mail->setFrom('grapkids@gmail.com', 'GRAP KIDS');
            $mail->addTo($email);
//            $mail->addBcc('grap_kids@hotmail.com');
            $mail->setSubject(Ey::utfToIso('Recuperación de contraseña'));

            if ($mail->send())
                return true;
            else
                return false;
        }
    }

}