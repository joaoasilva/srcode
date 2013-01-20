<?php
//
// Copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
//

class Controller{
	
	private $loader;
	private $model;

	const TITLE = 'Awesome CV to show OOP and a small MVC';
	

	public function Controller(){
	
		$this->loader = new Loader();
		$this->model = new Model();

		$header['title'] = Controller::TITLE;
		$this->loader->whataview('tmp_header', $header);

		$this->showcv();
		
	}
	
	private function showcv(){
		$cvdata = $this->model->cv_info();
		$cvdata['title'] = Controller::TITLE;
		$cvdata['studies'] = $this->sortYear($cvdata['studies']);
		$cvdata['works'] = $this->sortYear($cvdata['works']);
		$this->loader->whataview('whatabeautifulview', $cvdata);
	}

	private function sortYear($arr){
		krsort($arr, SORT_NUMERIC ); //LET'S JUST SORT BY YEAR
		return $arr;
	}

	private function render_js(){
		$jsdata = $this->model->dynamic_js();
		$this->loader->whataview('render_js', $jsdata);
	}	

	public function __destruct() {
		$this->render_js();
		$this->loader->whataview('tmp_bottom');
  	}
}