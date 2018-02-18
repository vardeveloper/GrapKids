<?php

class Web_Videos extends Web_BasePage 
{

    public function mainContent() 
    {
        parent::set_title('Videos | Grap Kids');
        parent::add_head_content('<meta name="Keywords" content="" />');
        parent::add_head_content('<meta name="Description" content="" />');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');

        $vid_key = Ey::getPrm(2);

        $obj = new Web_Db_Videos();
        $db = $obj->getAdapter();
        $select = $db->select()
                        ->from('gk_videos')
                        ->Where('vid_estado=?', 1)
                        ->order('vid_id DESC');

        if ($vid_key != '') {
            $select->where('vid_key=\'' . $vid_key . '\'');
        }

        $rows = $db->fetchRow($select);

        //**    Consulta para el listado de videos    */
        $select = $obj->select()->where('vid_estado=?', 1)->order('vid_id DESC');
        $pager = new Ey_Pager($select, WEB_ROOT . '/videos', Ey::getPrm(1), 8);
        $rs = $pager->fetchAll();
        $navegador = $pager->getNavigation();

        foreach ($rs as $item) {
            //** Obtnego el codgio del video de youtube para las imagenes   */
            $link = explode("\"", $item->vid_link);
            $codigo = explode("/", $link[5]);
            $cod = explode("?", $codigo[4]);
            $item->vid_link = $cod[0];
            //** Creo el link con el paginador para los videos   */
            $url = BASE_WEB_ROOT . '/videos/' . Ey::getPrm(1) . '/' . $item->vid_key;
            $item->vid_key = $url;
        }

        $smarty = new Smarty_Engine();
        $smarty->assign('video', $rows);
        $smarty->assign('videos', $rs);
        $smarty->assign('navegador', $navegador);
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'videos.tpl');
    }

}