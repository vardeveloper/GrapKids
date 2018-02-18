<?php

class Web_Admin_Videos_ModificarVideo extends Web_Admin_MainPage {

    public function mainContent() {
        return $this->actualizar();
    }

    private function actualizar() {
        $vid_id = Ey::getPrm(3);
        $obj = new Web_Db_Videos();
        $rs = $obj->fetchRow($obj->select()
                                 ->where('vid_id=?', $vid_id));

        $smarty = new Smarty_Engine();
        $smarty->assign('video', $rs);

        return $smarty->fetch(ADMIN_VIDEOS_DIR . DS . 'tpl' . DS . 'modificar-video.tpl');
    }

}