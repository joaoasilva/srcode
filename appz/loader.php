//
// Copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
//
<?php

class Loader{
	function whataview( $file_name, $data = null ){
		if (is_array($data)){
			extract($data);
		}

		include(VIEWPATH . $file_name . '.php');
	}
}