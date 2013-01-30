<?php
/**
 * 
 * @author  João Silva
 * @copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
 * 
 * This is were all the magic happens to assign keywords to templates and load the rendered page
 * 
 */

/** 
 * @package Appz
 */
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

    const TMPLDIR  = 'templates/';
    const TMPLEXT  = '.xhtml';

    private $page = null;
    private $keyWordsVal = array();

    /**
     * Load the template from xhtml file and assign it
     * 
     * @param string $template
     * @param string $layout
     * 
     */
    public function loadTemplate($template, $layout) {
        if ($this->page === null) {
            $this->page = $this->fileRead($layout);
        }

        if ($template != $layout){
        	$this->subKeyWords(constant('self::'.strtoupper($template)), $this->fileRead($template) );
    	}
        
        $this->subKeyWords( array_keys($this->keyWordsVal), $this->keyWordsVal );
    }

    /**
     * Search for keywords on the template, replace them with the content and load into page to display
     * @param mixed $keyWords 
     * @param mixed $tmpl_content 
     * 
     */
    private function subKeyWords($keyWords, $tmpl_content) {
        if (is_array($keyWords) && !is_array($tmpl_content) || !is_array($keyWords) && is_array($tmpl_content) ) {
        	try {
                throw new Exception();
            }catch (Exception $e) {
                echo 'Keywords and template does not match</br>'. $e;
            }
        }

        if ( $this->page === null) {
            try {
                throw new Exception();
            }catch (Exception $e) {            
                echo 'Page not loaded</br>'. $e;
            }
        }

        $this->page = str_replace($keyWords, $tmpl_content, $this->page);
    }

    /**
     * Assign template to array that after will substitute keywords
     * @param string $keyWords 
     * @param string $tmpl_content 
     * 
     */
    public function addKey($keyWords, $tmpl_content) {
        $this->keyWordsVal[$keyWords] = $tmpl_content;
    }

    /**
     * Read the template content from file
     * @param string $filename 
     * 
     */
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

    /**
     * Load the rendered page
     * @return string
     */
    public function  __toString() {
        return $this->page;
    }

    /**
     * Method for getting the views and render all incoming data into them
     * @param string $file_name 
     * @param mixed $data 
     * @return string
     */
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