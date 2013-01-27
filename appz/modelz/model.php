<?php
//
// Copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
//

class Model{

	//UNDER CONSTRUCTION!!!

	protected $database;

	const SKYPE = 'joaoacsilva'; //JUST TO USE CONSTANTS
	const MOBILE = '+351 916 263 710';
	const TABLE = 'cv';

	public function cv_info(){
		/*
		
		NOT FINISHED

		$cv_info = $this->selectWhere(self::TABLE, '*', array('skype_id' => 'joaoacsilva'));
		return $cv_info[0];
		
		NOT FINISHED
		
		*/

		// SIMULATES REAL DATA (it's real because it's my CV...)
		return array(
				'skype_id' => self::SKYPE,
				'mobile' => self::MOBILE,
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

    private function connect_db() {
        $this->database = new Database();
        $this->database->connect();
    }

    private function select($table, $values){
    	$table = mysql_real_escape_string($table);
    	$values = mysql_real_escape_string($values);

    	return $sql = 'select '.$values.' from '.$table;
    }

    private function where($sql, $values){

    	$sql .= ' where ';

    	$total = count($values);
    	$counted = 0;

    	if ($total){
	    	foreach($values as $key => $val){
	    		if ($counted && $counted != $total) $sql .= ' and ';
	    		$sql .= ' ' . $key . ' = "' . $val . '"';
	    	}
	    }

	    return $sql;
    }

    public function selectWhere($table, $fields, $values){
    	$sql = $this->select($table, $fields);
		$sql = $this->where($sql, $values);

		return $this->queryMultiple($sql);
    }

    protected function querySingle($sql) {
        $this->connect_db();
        return $this->database->querySingle($sql);
    }

    protected function queryMultiple($sql) {
        $this->connect_db();
        return $this->database->queryMultiple($sql);
    }


}