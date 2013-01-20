<?php

//
// Copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
//

class Work extends Model{
	//HERITAGE
	public function getWork(){
		return array(
					date("Y") => array(
								'last_month' => strtoupper( date("M") ),
								'start_month' => 'APR',
								'start_year' => '2007',
								'name' => 'AmplitudeNET, LDA',
								'activity' => 'AmplitudeNET, LDA is a company specialized in Web Development, E-Commerce, Social Networks, Digital Signage and Corporate TV.',
								'role' => 'Web Developer',
								'description' => 'At Amplitudenet I started to help the final development of ud121 framework and my first project on a Gaming Blog. From then I developed websites like: http://www.bgamer.pt (Gaming, Multimedia), http://www.4play.pt (Gaming, Multimedia), http://www.presenca.pt (Books, E-Commerce), http://www.livrarialeitura.pt/ (Books, E-Commerce), http://www.saidadeemergencia.com/ (Books, E-Commerce), http://www.msc.com.pt (Real Estate, Intranet), http://www.rolandsystemsgroup.eu/ (Music, Multimedia), http://www.rolandiberia.com/ (Music, E-Commerce), http://expert.com.pt/ (Hardware, E-Commerce), http://www.cinemacity.pt/ (Cinema, E-Commerce).<br>
When I joined the company we were 4 developers and now we are 19 and I am the Head Manager implementing, integrating and developing all the Corporate Tv and Digital Signage projects and I’m on the development team of the new Corporate Tv web based software called WorldVDS. I specialized in video and audio broadcasts and have done transmissions for the Corporate TVs for the major events of our clients. I have strong knowledge in audio/video transcoding in LAMP environments (CentOS, Fedora, Ubuntu) using VLC Media Encoder and installing and implementing Virtual Machines in VirtualBox to do broadcasts.<br> 
Between WorldVDS development I help my co-workers fixing problems and developing new functionalities for other Web Projects.
',
								'technologies' => 'LAMP, Linux, PHP, XML, MySQL, Javascript, jQuery, Web Services, Symfony, Joomla, Doctrine, webManager, ud121, VLC, Windows Media Encoder and Expression'
								),
					'2008'	=> array(
								'last_month' => 'FEB',
								'start_month' => 'MAR',
								'start_year' => '2007',
								'name' => 'CL-Soft',
								'activity' => 'I was responsible for all the sales, budgeting, accounting, management, maintenance of my Computer Store.',
								'role' => 'Owner and Manager',
								'description' => 'I was responsible for all the sales, budgeting, accounting, management, maintenance of my Computer Store.',
								'technologies' => ''
								),
				);
	}
}