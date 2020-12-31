<?php
/**
 * Bespoke conditional wizard/guide setup.
 *
 * @package rt-wizard
 * @author soup-bowl <code@soupbowl.io>
 * @license MIT
 *
 * @wordpress-plugin
 * Plugin Name:       ReviveToday Wizard
 * Description:       Bespoke conditional wizard/guide setup.
 * Plugin URI:        https://github.com/ReviveToday/wizard
 * Version:           0.1
 * Author:            soup-bowl
 * Author URI:        https://www.soupbowl.io
 * License:           MIT
 * Text Domain:       rtwizd
 */

add_action( 'init', 'rtwizd_wizard_init' );

/**
 * Load in the functionality during initalisation.
 */
function rtwizd_wizard_init() {
	add_shortcode( 'rt-wizard', 'rtwizd_wizard_shortcode' );
}

/**
 * Registers a wizard shortcode.
 *
 * @param array $atts Attributes passed to shortcode.
 * @return string
 */
function rtwizd_wizard_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'id' => '0' ), $atts, 'rt-wizard' );
	$sets = json_decode( file_get_contents( __DIR__ . '/setup.json' ), 'false' );
	$sets = $sets[ $atts['id'] ];

	wp_enqueue_script( 'rt-wizard-js', plugin_dir_url( __FILE__ ) . '/rt-wizard.js', array(), '0.1', true );
	wp_localize_script(
		'rt-wizard-js',
		'RTWIZZ',
		array(
			'id'      => $atts['id'],
			'content' => $sets,
		)
	);

	$selecthtml = '';
	foreach ( $sets['selection'] as $name => $selection ) {
		$optshtml = '';
		foreach ( $sets['selection'][ $name ] as $legend => $option ) {
			$optshtml .= "<option value=\"{$legend}\">{$option}</option>";
		}

		$selecthtml .= "<label for=\"rtwiz1\">aaa</label><select id=\"{$name}\">{$optshtml}</select>";
	}

	return $selecthtml;
}
