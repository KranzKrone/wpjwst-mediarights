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

	function addMenu(){
		add_menu_page('mediarights', 'mediarights', 20, _);
	}

}
new WPMediaRights();

function profile() {
	?>
	<h1>Profile</h1>
	<a href="/wp-admin/admin.php?page=bloggerei">Bloggerei</a><br />
	<a href="/wp-admin/admin.php?page=blogoscoop">Blogoscoop</a><br />
	<a href="/wp-admin/admin.php?page=topblogs">Top Blogs</a><br />
	<?PHP
}

function bloggerei() {
	echo "<iframe style=\"width:100%;height:600px\" 
src=\"http://www.bloggerei.de/blog/9176/stevieswebsite-blog\"></iframe>";
}

function blogoscoop() {
	echo "<iframe style=\"width:100%;height:600px\" 
src=\"http://www.blogoscoop.net/blog/blog.stevieswebsite.de\"></iframe>";
}

function topblogs() {
	echo "<iframe style=\"width:100%;height:600px\" 
src=\"http://www.topblogs.de/blog-5901.html\"></iframe>";
}


function profileAddMenu() {
	add_menu_page('MediaRights', 'MediaRights', 10, __FILE__, 'profile');
	add_submenu_page(__FILE__, 'Bloggerei', 'Bloggerei', 10, 'bloggerei', 'bloggerei');
	add_submenu_page(__FILE__, 'Blogoscoop', 'Blogoscoop', 10, 'blogoscoop', 'blogoscoop');
	add_submenu_page(__FILE__, 'Top Blogs', 'Top Blogs', 10, 'topblogs', 'topblogs');
}

add_action('admin_menu', 'profileAddMenu');
