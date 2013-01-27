<?php
//
// Copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
//

class Model{

	const SKYPE = 'joaoacsilva'; //JUST TO USE CONSTANTS
	const MOBILE = '+351 916 263 710';

	public function cv_info(){

		//JUST TO USE INHERITANCE
		/*

		$studies = new Studies();
		$studies_arr = $studies->getStudies();

		$work = new Work();
		$work_arr = $work->getWork();

		$others = new Others();
		$others_arr = $others->getOthers();*/

		// SIMULATES REAL DATA (it's real because it's my CV...)
		return array(
				'skype_id' => Model::SKYPE,
				'mobile' => Model::MOBILE,
				'first' => 'João',
				'last' => 'Silva'
				);
	}

	public function getProfile(){
		$profile = new Profile();
		return $profile->getProfile();		
	}

	public function getSkills(){
		$skills = new Skills();
		return array('skills' => $skills->getSkills());		
	}

	public function getStudies(){
		$studies = new Studies();
		return array('studies' => $studies->getStudies());		
	}

	public function getWork(){
		$work = new Work();
		return array('works' => $work->getWork());		
	}

	public function getOthers(){
		$others = new Others();
		return array('others' => $others->getOthers());		
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