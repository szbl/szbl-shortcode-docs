<?php
/*
Plugin Name: Shortcode Docs
Description: Quick page in the admin for themes to display shortcode documentation.
Author: Sizeable Interactive
Author URI: https://sizeableinteractive.com
Version: 1.0.0
*/
class Sizeable_Shortcode_Docs
{
	public static $instance;

	public static function init()
	{
		null === self::$instance && self::$instance = new self();
		return self::$instance;
	}

	private function __construct()
	{
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	public function admin_menu()
	{
		add_submenu_page( 'tools.php', 'Shortcode Docs', 'Shortcode Docs', 'edit_users', 'szbl-shortcode-docs', array( $this, 'main' ) );
	}

	public function main()
	{
		$shortcodes = apply_filters( 'szbl_shortcode_docs', array() );
		ksort( $shortcodes );
		include __DIR__ . '/views/main.php';
	}
}

Sizeable_Shortcode_Docs::init();