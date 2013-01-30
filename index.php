<?php
/**
 * 
 * @author  João Silva
 * @copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
 * 
 * C:\wamp\bin\php\php5.4.3\phpdoc.bat run -d E:\Development\php\srcode -t E:\Development\php\srcodedoc -i swiftlib/
 * 
 */

/**
 * DISPLAY ERRORS FOR DEV (IT's a SRCODE and never goes outta DEV) 
 */
ini_set('display_erros', 1);

defined("BASEPATH") or define("BASEPATH", dirname(realpath(__FILE__)) . '/');
defined("APPPATH") or define("APPPATH", BASEPATH . 'appz/');
defined("VIEWPATH") or define("VIEWPATH", BASEPATH . 'whataviews/');
defined("MODELPATH") or define("MODELPATH", APPPATH . 'modelz/');

require (BASEPATH . 'appz/srcode2lookat.php');



