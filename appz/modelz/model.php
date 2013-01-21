<?php
//
// Copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
//

class Model{

	const SKYPE = 'joaoacsilva'; //JUST TO USE CONSTANTS
	const MOBILE = '+351 916 263 710';

	public function cv_info(){

		//JUST TO USE INHERITANCE
		$skills = new Skills();
		$skills_arr = $skills->getSkills();

		$studies = new Studies();
		$studies_arr = $studies->getStudies();

		$work = new Work();
		$work_arr = $work->getWork();

		$others = new Others();
		$others_arr = $others->getOthers();

		// SIMULATES REAL DATA (it's real because it's my CV...)
		return array(
				'skype_id' => Model::SKYPE,
				'mobile' => Model::MOBILE,
				'first' => 'João',
				'last' => 'Silva',
				'profile' => 'My passion for computers was born when I was 6 years old from a ZX Spectrum 48K. In 1993 I had access to my first PC and from there on I dedicated several hours of my life to them. Due to my passion, in high school I went to Computer Technologies and programmed in Pascal, COBOL and C++. After high school I worked as a Computer Technician and System Maintenance. I enlisted in Portuguese Army as a Transmissions Operator and after a year and a half, I decided it was time to take a university course. I went into Programming Technologies and Computer Systems at University of Aveiro and programmed in languages such as Python, VB.NET, MIPS Assembly, HTML, CSS, XML, Javascript, PHP, C #. My final project was a Web based car tuning game in ASP.NET. After University I opened a business selling Computers Hardware and went to work for AMPLITUDENET, LDA as Web Developer.<br>I’m passionate about new technologies, new challenges and constant learning.
I’m an all-in-one worker and my expertise covers contact with customers, gathering requirements, budgeting, project development and subsequent maintenance.',
				'skills' => $skills_arr,
				'studies' => $studies_arr,
				'works' => $work_arr,
				'others' => $others_arr
				);
	}

	public function dynamic_js(){
		//FROM DATABASE WITH JS DEPENDENCIES...? :) Sorry... it's a simulation again...
		$js_arr['js_files'] = array(
				'jquery',
				'tolink',
				'validator',
				'bootstrap.min'
				);

		return $js_arr;
	}
}