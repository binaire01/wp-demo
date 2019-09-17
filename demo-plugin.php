<?php
/**
 * Plugin Name: Demo Plugin
 * Plugin URI:  
 * Description: plugin de démonstration.
 * Version:     1.0.2
 * Author:      wp-code
 * Author URI:  https://www.facebook.com/groups/1569514623182106/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: demo-plugin
 * Domain Path: /languages
 */
 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class DemoPlugin {

	public $plugin_version;
	public $plugin_title;
	public $plugin_textDomain;
	public $plugin_languages;

	public function __construct(){
		$this->get_plugin_info();
		add_action( 'plugins_loaded', array( $this,'load_plugin_textdomain' ));
		add_action( 'admin_menu', array( $this,'create_menu_panel' ));
	}

	function load_plugin_textdomain() {
		load_plugin_textdomain( $this->plugin_textDomain , false, plugin_dir_path( __FILE__ ) . '/languages');
	}


	private function get_plugin_info(){
		if( !function_exists('get_plugin_data') ){
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		$this->plugin_version 		= get_plugin_data( __FILE__ )['Version'];
		$this->plugin_title 		= get_plugin_data( __FILE__ )['Title'];
		$this->plugin_textDomain	= get_plugin_data( __FILE__ )['TextDomain'];
		$this->plugin_languages		= get_plugin_data( __FILE__ )['DomainPath'];
	}

	public function create_menu_panel(){
		$page_title = $this->plugin_title;
		$menu_title = $this->plugin_title;
		$capability = 'manage_options';
		$menu_slug  = basename(dirname( __FILE__ ));
		$function   = array( $this, 'admin_page' );
		$icon       = 'dashicons-admin-generic';
		$position 	= 101;
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon, $position);
	}

	public function admin_page(){
		if( file_exists(plugin_dir_path( __FILE__ ).'/admin.php')) :
			require_once(plugin_dir_path( __FILE__ ).'/admin.php');
		else :
			echo '<p><i>'.__('Plugin without admin page', $this->plugin_textDomain).'</i></p>';
		endif;
	}
}
new DemoPlugin;