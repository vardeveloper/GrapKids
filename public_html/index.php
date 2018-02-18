<?php

ini_set('display_errors', true);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);

$root = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'core';

include_once($root . DIRECTORY_SEPARATOR . 'lib.start.php');
