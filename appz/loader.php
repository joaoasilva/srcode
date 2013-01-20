<?php

class Loader{
	function whataview( $file_name, $data = null ){
		if (is_array($data)){
			extract($data);
		}

		include(VIEWPATH . $file_name . '.php');
	}
}