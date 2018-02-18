<?php

abstract class Web_Admin_MainPage extends Web_Admin_BasePage {

    public function getContent() {
        $page = new Smarty_Engine();
        $page->assign('pagecontent', $this->mainContent());
        $menu = new Web_Admin_Wgt_Menu();
        $htmlMenu = $menu->render();
        $page->assign('menu', $htmlMenu);
        return $page->fetch(ADMIN_TPL . DS . 'main.tpl');
    }

    abstract protected function mainContent();
}