<?php

//BUT THERE IS NOTHING TO SEE HERE...

require(APPPATH . 'loader.php');
require(MODELPATH . 'model.php');
require(MODELPATH . 'skills.php');
require(MODELPATH . 'studies.php');
require(MODELPATH . 'work.php');
require(MODELPATH . 'others.php');
require(MODELPATH . 'emailform.php');
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