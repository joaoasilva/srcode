<?php
/**
 * 
 * @author  João Silva
 * @copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
 * 
 * This is the controller that bridge data from models and process it with the views to output to the client
 * 
 */

/** 
 * @package Appz
 */
class Controller{
	
	private $loader = null;
	private $model;

	private static $layout = 'home';
	
	/**
	 * It all starts here
	 */
	public function Controller(){
	
		$this->loader = new Loader();
		$this->model = new Model();

		$this->showcv();
		
	}

	/**
	 * Method that processes all the CV data
	 */
	private function showcv(){
		$this->loader->addKey(Loader::TITLE, 'Awesome CV to show OOP and a small MVC');
		
		$header_data = $this->model->cv_info();
		$content_header = $this->loader->renderView('content_header', $header_data);
		$this->loader->addKey(Loader::CONTENT_HEADER, $content_header);

		$profile_data = $this->model->getProfile();
		$this->loader->addKey(Loader::CONTENT_PROFILE, $profile_data['profile']);

		$skills_data = $this->model->getSkills();
		$content_skills = $this->loader->renderView('content_skills', $skills_data);
		$this->loader->addKey(Loader::CONTENT_SKILLS, $content_skills);	

		$studies_data = $this->model->getStudies();
		$studies_data = $this->sortYear($studies_data);
		$content_studies = $this->loader->renderView('content_studies', $studies_data);
		$this->loader->addKey(Loader::CONTENT_STUDIES, $content_studies);

		$work_data = $this->model->getWork();
		$work_data = $this->sortYear($work_data);
		$content_work = $this->loader->renderView('content_work', $work_data);
		$this->loader->addKey(Loader::CONTENT_WORK, $content_work);		

		$others_data = $this->model->getOthers();
		$content_others = $this->loader->renderView('content_others', $others_data);
		$this->loader->addKey(Loader::CONTENT_OTHERS, $content_others);

		$this->loader->loadTemplate('content', 'home');

		$JS = $this->render_js();

		$this->loader->addKey(Loader::CONTENT, $this->loader);
		$this->loader->loadTemplate('email_form', 'home');
		$this->loader->addKey(Loader::JAVASCRIPT, $JS);

		$this->render('home');

	}

	/**
	 * Method to sort array by number, in this case the year so we can have the CV with a correct timetable order
	 * @param array $arr 
	 * @return array
	 */
	private function sortYear($arr){
		krsort($arr, SORT_NUMERIC ); //LET'S JUST SORT BY YEAR
		return $arr;
	}

	/**
	 * Method to start the template processes and output the result
	 * @param string $template 
	 */
    protected function render($template) {
        $this->loader->loadTemplate($template, self::$layout);
        header('Content-Type', 'text/html, charset=UTF-8');

        echo $this->loader;
    }	

    /**
     * Method for the Javascript render
     * @todo  Change it to JSON Data
     * @return string
     */
	private function render_js(){
		$jsdata = $this->model->dynamic_js();
		return $this->loader->renderView('render_js', $jsdata);
	}	
}