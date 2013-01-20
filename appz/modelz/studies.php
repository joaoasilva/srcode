<?php

//
// Copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
//

class Studies extends Model{
	//HERITAGE
	public function getStudies(){
		return array(
					'2007' => '<b>University of Aveiro, Portugal</b><br>
 		<b>Degree in Programming Technologies and Computer Systems</b><br>
<b>Main field of study for the qualification:</b> Graduate in Programming Languages<br>
<b>Learned:</b><br> Architecture and computer systems<br>
	        		  Multimedia tools<br>
	        		  Programming languages<br>
	        		  Computer security<br>
	        		  Final work experience in Company ITCenter from Santa Maria da Feira developing modules to automate VOIP settings in PHP
',
					'2005' => '<b>Computer Technology</b><br>
<b>Main field of study for the qualification:</b> Computer Technician<br>
<b>Learned:</b><br> Programming languages<br>
	         	 	  Networks and Maintenance
'
				);
	}
}