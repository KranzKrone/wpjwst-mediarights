<?php
/**
 * Created by PhpStorm.
 * User: Jules
 * Date: 17.11.2018
 * Time: 12:24
 */


if ( !class_exists( 'SettingsRights' ) )
{
	class SettingsRights
	{
		public static function init()
		{
			register_setting('wpjwstmr_settings', 'wpjwstmr_default_author');
		}

		public static function get_default_author()
		{
			return get_option('wpjwstmr_default_author');
		}
	}
}