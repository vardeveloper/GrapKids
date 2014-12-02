<?php

class Web_GaleriaDetalle extends Web_BasePage 
{

    public function mainContent() 
    {
        parent::add_head_content('<meta name="Keywords" content="juegos recreativos, juegos recreativos infantiles, juegos recreativos para niños, juegos recreativos deportivos, juegos recreativos peru, juegos infantiles, juegos acuaticos, juegos infantiles parques" />');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');
        parent::add_css_link(BASE_WEB_ROOT . '/css/prettyPhoto.css');
        parent::add_js_link(BASE_WEB_ROOT . '/js/jquery-prettyPhoto.js');
        
        $gal_key = Ey::getPrm(1);
        $obj = new Web_Db_Galerias();
        $gal_id = $this->obtenerId($obj, 'gal', $gal_key);

        global $db;
        
        $galeria = $db->fetchRow($db->select()
                                ->from('gk_galerias', array('gal_titulo'))
                                ->where('gal_id=?', $gal_id));
        
        parent::set_title(ucwords($galeria->gal_titulo) . ' | Grap Kids');
        parent::add_head_content('<meta name="Description" content=" ' . ucwords($galeria->gal_titulo) . ' " />');
        
        $rs = $db->fetchAll($db->select()
                                ->from('gk_fotos')
                                ->where('fot_gal_id=?', $gal_id)
                                ->order('fot_id'));
        
        $smarty = new Smarty_Engine();
        $smarty->assign('fotos', $rs);
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'galeria-detalle.tpl');
    }

}