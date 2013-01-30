<?php
/**
 * 
 * @author  João Silva
 * @copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
 * 
 * This is were all the data gets ALIVE! :)
 * 
 */

/** 
 * @package Modelz
 */
class Model{

	protected $database;

	const SKYPE = 'joaoacsilva';
	const MOBILE = '+351 916 263 710';
	const TABLE = 'cv';

	/**
	 * @todo  IMPLEMENT MYSQL
	 * @return array
	 */
	public function cv_info(){
		/**
		*
		* NOT FINISHED
		*
		* $cv_info = $this->selectWhere(self::TABLE, '*', array('skype_id' => 'joaoacsilva'));
		* return $cv_info[0];
		*
		* NOT FINISHED
		*
		* SIMULATES REAL DATA (it's real because it's my CV...)
		*/
$cv_info = $this->selectWhere(self::TABLE, '*', array('skype_id' => 'joaoacsilva'));
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

	/**
	 * @todo GET ALL THE JAVASCRIPT DEPENDENCIES FROM A DB FOR EASY MANAGEMENT AND LATER ASSIGN ONLY FOR THE RIGHT LAYOUTS
	 * @return array
	 * FROM DATABASE WITH JS DEPENDENCIES...? :) Sorry... it's a simulation for now...
	 */
	public function dynamic_js(){
		
		$js_arr['js_files'] = array(
				'jquery',
				'tolink',
				'validator',
				'bootstrap.min'
				);

		return $js_arr;
	}

	/**
	 * Method that connects to DB
	 */
    private function connect_db() {
        $this->database = new Database();
        $this->database->connect();
    }

    /**
     * Method to start building a select query
     * @todo  MIXED VALUES
     * @param string $table 
     * @param mixed $values 
     * @return string
     */
    private function select($table, $values){
    	$table = mysql_real_escape_string($table);
    	$values = mysql_real_escape_string($values);

    	return $sql = 'select '.$values.' from '.$table;
    }

    /**
     * Method to build the WHERE query
     * @param string $sql 
     * @param mixed $values 
     * @return string
     */
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

    /**
     * Method to build the SELECT WHERE query and execute it
     * @todo  MIXED VALUES
     * @param string $table 
     * @param mixed $fields 
     * @param array $values 
     * @return array
     */
    public function selectWhere($table, $fields, $values){
    	$sql = $this->select($table, $fields);
		$sql = $this->where($sql, $values);

		return $this->queryMultiple($sql);
    }

    /**
     * Method to execute query 
     * @param string $sql 
     * @return string
     */
    protected function querySingle($sql) {
        $this->connect_db();
        return $this->database->querySingle($sql);
    }

    /**
     * Method to execute query
     * @param string $sql 
     * @return array
     */
    protected function queryMultiple($sql) {
        $this->connect_db();
        return $this->database->queryMultiple($sql);
    }


}