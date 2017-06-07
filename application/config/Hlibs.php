<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
* CREATE USING : HYBRIDAUTH
*  URL LINK     : HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
* COMBINE       : CODEIGNITER 3.1.4
* AUTHOR        : SURYO GALIH KENCANA HRIANJA
* CREATE AT     : JUNE 2017
*/

$config =
	array(

		// set on "base_url" the relative url that point to HybridAuth Endpoint

		'base_url' => '/auth/endpoint/',

		"providers" => array (

			// "OpenID" => array (
			// 	"enabled" => true
			// ),

			// "Yahoo" => array (
			// 	"enabled" => true,
			// 	"keys"    => array (
			// 						"id" => "", 
			// 						"secret" => "" 
			// 						),
			// ),

			// "AOL"  => array (
			// 	"enabled" => true
			// ),

			"Google" => array (
				"enabled" => true,
				"keys"    => array ( 
									"id" => "619844628733-q2uq55d9iktc6eljii9ls660m9pv49ag.apps.googleusercontent.com", 
									"secret" => "AcCH2dYsIJNP7pzH6auooGr4" 
									),
				"redirect_uri"=>"http://rhionair3.dev/auth/?auth.home=google",
			),

			"Facebook" => array (
				"enabled" => true,
				"keys"    => array ( 
									"id" => "1900156573533109", 
									"secret" => "49f5f59de4dfb78bb75ddfbaa5d8a9eb" 
									),
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( 
									"key" => "ZdCMV0hLNzo4X9wxhHAB4cb4C", 
									"secret" => "TS24JOYfhVK2dGldlIxdRMFaqpQ4nhCV1DmQ7nAe68M2VowBF1" 
									)
			),

			// "Live" => array (
			// 	"enabled" => true,
			// 	"keys"    => array ( 
			// 						"id" => "", 
			// 						"secret" => "" 
			// 						)
			// ),

			// "MySpace" => array (
			// 	"enabled" => true,
			// 	"keys"    => array ( 
			// 						"key" => "", 
			// 						"secret" => "" 
			// 						)
			// ),

			"LinkedIn" => array (
				"enabled" => true,
				"keys"    => array ( 
									"key" => "81sfar9f119xim", 
									"secret" => "Wle8hd8cZFE6KEvN" 
									)
			),

			// "Foursquare" => array (
			// 	"enabled" => true,
			// 	"keys"    => array ( 
			// 						"id" => "", 
			// 						"secret" => "" 
			// 						)
			// ),

		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"

		"debug_mode" => false,

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);
/* End of file Hlibs.php */
/* Location: ./application/config/Hlibs.php */