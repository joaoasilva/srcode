<?php

//DISPLAY ERRORS FOR DEV (IT's a SRCODE and never goes outta DEV)
ini_set('display_erros', 1);

defined("BASEPATH") or define("BASEPATH", dirname(realpath(__FILE__)) . '/');
defined("APPPATH") or define("APPPATH", BASEPATH . 'appz/');
defined("VIEWPATH") or define("VIEWPATH", BASEPATH . 'whataview/');
defined("MODELPATH") or define("MODELPATH", APPPATH . 'modelz/');

require (BASEPATH . 'appz/srcode2lookat.php');