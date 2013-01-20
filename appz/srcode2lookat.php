<?php
//
// Copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
//

//BUT THERE IS NOTHING TO SEE HERE...

require(APPPATH . 'loader.php');
require(MODELPATH . 'model.php');
require(MODELPATH . 'skills.php');
require(MODELPATH . 'studies.php');
require(MODELPATH . 'work.php');
require(MODELPATH . 'others.php');
if (file_exists(MODELPATH . 'emailform.php')){ //It's just a email class using RESTFull to my Mandrill account
	require(MODELPATH . 'emailform.php');
}
require(APPPATH . 'controller.php');

if (isset($_POST['txt_email']) && trim($_POST['txt_subject']) && trim($_POST['txt_message']) ){
	$data = new stdClass();
	foreach($_POST as $var => $val){
		$data->{$var} = $val;
	}
	new Email($data);
}else{
	new Controller();
}