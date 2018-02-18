<?php

class Web_Db_Clientes extends Zend_Db_Table_Abstract {

    protected $_name = 'gk_clientes';
    protected $_primary = 'cli_id';
    protected $_sequence = true;

}