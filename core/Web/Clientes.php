<?php

class Web_Clientes extends Web_BasePage 
{

    public function mainContent() 
    {
        parent::set_title('Clientes | Grap Kids');
        parent::add_head_content('<meta name="Keywords" content="juegos recreativos, juegos recreativos infantiles, juegos recreativos para niños, juegos recreativos deportivos, juegos recreativos peru, juegos infantiles, juegos acuaticos, juegos infantiles parques" />');
        parent::add_head_content('<meta name="Description" content="GRAP KIDS: Nuestro principal interés es que el cliente se sienta cómodo y satisfecho por el producto adquirido, debido a esto fabricamos con insumos de alta calidad." />');
        parent::add_head_content('<meta name="robots" content="index, follow, all" />');
        parent::add_head_content('<meta name="revisit-after" content="7 days" />');

        $smarty = new Smarty_Engine();
        $smarty->assign('ColLeft', Web_Wgt_ColLeft::render());

        return $smarty->fetch(APP_ROOT . DS . 'tpl' . DS . 'clientes.tpl');
    }

}