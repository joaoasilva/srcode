<?php
//
// Copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
//

class Loader{
	
    const CONTENT = '{CONTENT}';
    const CONTENT_HEADER = '{CONTENT_HEADER}';
    const CONTENT_PROFILE = '{CONTENT_PROFILE}';
    const CONTENT_SKILLS = '{CONTENT_SKILLS}';
    const CONTENT_STUDIES = '{CONTENT_STUDIES}';
    const CONTENT_WORK = '{CONTENT_WORK}';
    const CONTENT_OTHERS = '{CONTENT_OTHERS}';

    const TITLE   = '{TITLE}';
    const EMAIL_FORM = '{EMAIL_FORM}';
    const JAVASCRIPT = '{JAVASCRIPT}';

    const TMPLDIR  = 'whataview/';
    const TMPLEXT  = '.xhtml';

    private $page = null;
    private $keyWordsVal = array();

    public function loadTemplate($template, $layout) {
        if ($this->page === null) {
            $this->page = $this->fileRead($layout);
        }

        if ($template != $layout){
        	$this->subKeyWords(constant('self::'.strtoupper($template)), $this->fileRead($template) );
    	}
        
        $this->subKeyWords( array_keys($this->keyWordsVal), $this->keyWordsVal );
    }

    private function subKeyWords($keyWords, $tmpl_content) {
        if (is_array($keyWords) && !is_array($tmpl_content) || !is_array($keyWords) && is_array($tmpl_content) ) {
        	throw new Exception('keywords and template does not match', 500);
        }

        if (null === $this->page) {
            throw new Exception('page not loaded', 500);
        }

        $this->page = str_replace($keyWords, $tmpl_content, $this->page);
    }

    public function addKey($keyWords, $tmpl_content) {
        $this->keyWordsVal[$keyWords] = $tmpl_content;
    }

    private function fileRead($filename)
    {
        $filename = self::TMPLDIR . $filename . self::TMPLEXT;
        $f_Content = "";
        $file = fopen($filename, 'r');
        if ($file) {
            $f_Content = fread($file, filesize($filename));
            fclose($file);
        }

        return $f_Content;
    }

    public function  __toString() {
        return $this->page;
    }

	function renderView( $file_name, $data = null ){
		if (is_array($data)){
			extract($data);
		}

		ob_start();
			include(VIEWPATH . $file_name . '.php');
			$rendered_data = ob_get_contents();
		ob_end_clean();

		return $rendered_data;
	}
}