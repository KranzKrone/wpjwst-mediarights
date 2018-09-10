<?php
/*
Plugin Name: MediaRight Management Tool
Plugin URI:   https://github.com/KranzKrone/wpjwst-picturerights
Description:  Media right management tool for Pictures 
Version: 0.0.0
Author: kranzkrone
Author URI: https://github.com/KranzKrone/
License: GNU General Public License 3      
License URI:  https://www.gnu.org/licenses/gpl-3.0.html
Text Domain:  mrmt
Domain Path:  /languages
*/

include_once 'inc/inputrights.class.php';

class WPMediaRights{
	
	public function __construct(){
		// Init all functions in classes
		new InputRights();
	}
	
	public function _init(){
		return null;
	}

	function uninstall(){
		return null;
	}
}
new WPMediaRights();

