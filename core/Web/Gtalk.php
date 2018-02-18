<?php

class Web_Gtalk extends Web_BasePopUp 
{

    public function mainContent() 
    {
        $this->set_title(':: Grap Kids ::');
        $view = new Smarty_Engine();
        return $view->fetch(APP_ROOT . DS . 'tpl' . DS . 'chat-gtalk.tpl');
    }

}