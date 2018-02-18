<?php

class Web_Admin_Banner_ModificarBanner extends Web_Admin_MainPage
{

    public function mainContent()
    {
        return $this->actualizar();
    }

    private function actualizar()
    {
        $ba_id = Ey::getPrm(3);
        $obj = new Web_Db_Banner();
        $db = $obj->getAdapter();
        $rs = $db->fetchRow($obj->select()->where('ba_id=?', $ba_id));

//        print_r($rs);

//        $imagen=BASE_WEB_ROOT.'/svc/get-img/portada-portada_'.$rs->fp_id.'/100:80';

        $smarty = new Smarty_Engine();
        $smarty->assign('banner', $rs);
//        $smarty->assign('imagen',$imagen);

        return $smarty->fetch(ADMIN_BANNER_DIR . DS . 'tpl' . DS . 'modificar-banner.tpl');
    }

}