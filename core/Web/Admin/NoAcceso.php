<?php

class Web_Admin_NoAcceso extends Web_Admin_BasePage {

    private $tipoAcceso;

    public function __construct() {
        parent::__construct();
    }

    public function getContent() {
        return '<div class="error">Usted no tiene acceso a este módulo</div>';
    }

}