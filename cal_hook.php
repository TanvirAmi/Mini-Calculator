<?php
/**
* Plugin Name: Mini Calculator
* Plugin URI: https://
* Description: This plugin will add calculator widget....in sidebar.
* Version: 1.0
* Author: Tanvir
* Author URI: https://twitter.com/TanvirFocus
* Author Email: tanvir.focus@gmail.com
*
* This program is free software; you can redistribute it and/or modify it under the terms of the GNU
* General Public License as published by the Free Software Foundation; either version 2 of the License,
* or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
* even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*
* You should have received a copy of the GNU General Public License along with this program; if not, write
* to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*
* @package Mini Calculator
* @since 0.1
* @author Tanvir
* @copyright Copyright (c) 2014, Tanvir
* @license http://www.gnu.org/licenses/gpl-2.0.html
*/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class calculator{

	//constructor method calling
	public function __construct(){
		 // Set the constants needed by the plugin.
		 add_action('init', array($this, 'constants'));
		 // Load javascript
		 add_action('init', array($this, 'enqueue_js'));
		 // Load the widget style.
		 add_action('init', array($this, 'cal_style'));
		 // Register widget.
		 add_action('widgets_init', array($this, 'register_widget'));
	}

	// Setting up plugin DIR & URI
	public function constants(){
		define('CAL_PLUG', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	}

	//adding the plugin stylesheet
	public function cal_style(){
		wp_enqueue_style('cal_css', CAL_PLUG.'includes/css/layout.css');
	}

	//adding the plugin js file
	public function enqueue_js(){
		wp_enqueue_script('cal_js', CAL_PLUG.'includes/js/cal.js', TRUE);
	}

	//Register and load the widget
	public function register_widget(){
		include_once('classes/widget.php');
		register_widget( 'mini_cal' );
	}
}

$obj = new calculator;
?>