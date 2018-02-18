<?php

class Web_Admin_Banner_VerBanner extends Web_Admin_MainPage
{

    public function mainContent()
    {
        return $this->ver();
    }

    private function ver()
    {
        $ba_id = Ey::getPrm(3);
        $obj = new Web_Db_Banner();
        $db = $obj->getAdapter();
        $rs = $db->fetchRow($obj->select()->where('ba_id=?', $ba_id));

        $smarty = new Smarty_Engine();
        $smarty->assign('banner', $rs);

        return $smarty->fetch(ADMIN_BANNER_DIR . DS . 'tpl' . DS . 'ver-banner.tpl');
    }

}