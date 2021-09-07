<?php

/**
 * User Meta Shortcode
 *
 * Plugin Name:       User Meta Shortcode
 * Description:       Add shortcode to display user meta.
 * Version:           1.0
 * Author:            Patryk Kachel
 * Author URI:        https://blogonyourown.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

class User_Meta_Shortcode {

	private static $_instance   = null;
	private $_user_table_fields = array( 'user_login', 'user_email', 'user_url', 'display_name', 'user_nicename', 'user_pass', 'ID', 'user_registered' );

	public function __construct() {
		add_shortcode( 'user_meta', array( $this, 'user_meta_shortcode' ) );
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function user_meta_shortcode( $atts ) {
		$atts = shortcode_atts(
			array(
				'id'  => get_current_user_id(),
				'key' => '',
			),
			$atts,
			'user_meta'
		);

		if ( empty( $atts['id'] ) || empty( $atts['key'] ) ) {
			return;
		}
		$output = '';
		if ( in_array( $atts['key'], $this->_user_table_fields ) ) {
			$output = $this->get_userdata( $atts );
		} else {
			$output = $this->get_user_meta( $atts );
		}
		return $output;
	}

	private function get_user_meta( $atts ) {
		return get_user_meta( $atts['id'], $atts['key'], true );
	}

	private function get_userdata( $atts ) {
		$userdata = get_userdata( $atts['id'] );
		$key      = $atts['key'];
		return $userdata->$key;
	}
}

User_Meta_Shortcode::instance();
