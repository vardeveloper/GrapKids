<?php

class Web_Wgt_Slider
{

    public function render()
    {
        global $db;

        $rs = $db->fetchAll($db->select()
                                ->from('gk_productos', array('pro_nombre', 'pro_key', 'pro_id'))
                                ->where('pro_estado=?', 0)
                                ->order(array('pro_fecha_update DESC', 'pro_nombre')));
//        print_r($rs);

        $smarty = new Smarty_Engine();
        $smarty->assign('novedades', $rs);

        return $smarty->fetch(TPL_ROOT . DS . 'wgt-slider.tpl');
    }

}