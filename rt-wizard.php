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

	wp_enqueue_script( 'rt-wizard-js', plugin_dir_url( __FILE__ ) . '/rt-wizard.js', array(), '0.1', true );
	wp_localize_script(
		'rt-wizard-js',
		'RTWIZZ',
		array(
			'id' => $atts['id'],
			'',
		)
	);

	switch ( $atts['id'] ) {
		case '1':
			$opts01     = array(
				'0' => 'Select...',
				'1' => 'PSP 1000',
				'2' => 'PSP 2000',
				'3' => 'PSP 3000',
				'4' => 'PSP Street',
				'G' => 'PSP Go!',
			);
			$opts01html = '';
			foreach ( $opts01 as $ok => $ov ) {
				$opts01html .= "<option value=\"{$ok}\">{$ov}</option>";
			}

			$opts02     = array(
				0 => 'Select...',
				1 => 'Yes',
				2 => 'No',
			);
			$opts02html = '';
			foreach ( $opts02 as $ok => $ov ) {
				$opts02html .= "<option value=\"{$ok}\">{$ov}</option>";
			}

			return "<label for=\"rtwiz1\">aaa</label><select id=\"rtwiz1\">{$opts01html}</select><label for=\"rtwiz2\">bbb</label><select id=\"rtwiz2\">{$opts02html}</select>";
		default:
			return '';
	}
}
