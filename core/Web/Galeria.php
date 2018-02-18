<?php

class Web_Galeria extends Web_BasePage 
{

    public function mainContent() 
    {
        parent::set_title('Galeria | Grap Kids');
        parent::add_head_content('<meta name="Keywords" content="juegos recreativos, juegos recreativos infantiles, juegos recreativos para niños, juegos recreativos deportivos, juegos recreativos peru, juegos infantiles, juegos acuaticos, juegos infantiles parques" />');
        parent::add_head_content('<meta name="Description" content="Grap kids: brindamos servicio de mantenimiento de Juegos Recreativos Infantiles en lima y todas las provincias del interior del Perú." />');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');
        
        global $db;
        $rs = $db->fetchAll($db->select()
                                ->from('gk_galerias')
                                ->where('gal_estado=?', 1)
                                ->order('gal_id DESC'));
        
        $smarty = new Smarty_Engine();
        $smarty->assign('galerias', $rs);
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'galeria.tpl');
    }

}