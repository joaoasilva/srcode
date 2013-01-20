<?php

//
// Copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
//

class Others extends Model{
	//HERITAGE
	public function getOthers(){
		return array(
					array(
						'title' => 'Social Skills and competences',
						'description' => '<p>Good communication with costumers</p>
<p>Very active when solving problems</p>
<p>Good problem fixer even on projects developed by others</p>
<p>Ease of adaptation and very fast learner</p>
<p>Never give up</p>
<p>Good team player and very sociable</p>
'
					),
					array(
						'title' => 'Organizational skills and competences',
						'description' => '<p>Ability to manage projects</p>
<p>Ability to coach (direct trainees who worked in the company)</p>
'
					),
					array(
						'title' => 'Languages',
						'description' => '<p>English (fluent)</p>
<p>Portuguese (native)</p>
<p>Spanish (beginner)</p>
<p>French (beginner)</p>
'
					),
					array(
						'title' => 'Interests',
						'description' => '<p>Movies and Series</p>
<p>Musician (Tenor Saxophone)</p>
<p>Computer games</p>
<p>Arduino based robots assembling and programming</p>
<p>Technology addicted</p>
'
					)					
				);
	}
}