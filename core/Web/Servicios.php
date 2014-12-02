<?php

class Web_Servicios extends Web_BasePage 
{

    public function mainContent() 
    {
        parent::set_title('Servicios | Juegos Recreativos Infantiles | Grap Kids');
        parent::add_head_content('<meta name="Keywords" content="juegos recreativos, juegos recreativos infantiles, juegos recreativos para niños, juegos recreativos deportivos, juegos recreativos peru, juegos infantiles, juegos acuaticos, juegos infantiles parques" />');
        parent::add_head_content('<meta name="Description" content="Contamos con un personal altamente calificado, garantizando así un mejor servicio en reparaciones, mantenimiento, traslado, montaje de toda clase de juegos infantiles." />');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');

        $smarty = new Smarty_Engine();
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'servicios.tpl');
    }

}