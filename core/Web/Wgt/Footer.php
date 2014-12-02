<?php

class Web_Wgt_Footer
{

    public function render()
    {
        $smarty = new Smarty_Engine();
        return $smarty->fetch(TPL_ROOT . DS . 'wgt-footer.tpl');
    }

}