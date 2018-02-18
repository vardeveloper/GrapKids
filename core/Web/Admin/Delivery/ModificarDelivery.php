<?php

class Web_Admin_Delivery_ModificarDelivery extends Web_Admin_MainPage {

    public function mainContent() {
        return $this->actualizar();
    }

    private function actualizar() {
        $del_id = Ey::getPrm(3);
        $obj = new Web_Db_Delivery();
        $rs = $obj->fetchRow($obj->select()->where('del_id=?', $del_id));
        $smarty = new Smarty_Engine();
        $smarty->assign('delivery', $rs);
        return $smarty->fetch(ADMIN_DELIVERY_DIR . DS . 'tpl' . DS . 'modificar-delivery.tpl');
    }

}