<?php
/**
 * Mock versions of WP functions.
 */

namespace LuboDyer\WPNonces;

/**
 * Mock add_query_arg()
 */
function add_query_arg($name, $nonce, $actionurl) {
	return $actionurl . '?'. $name . '='. $nonce;
}

/**
 * Mock esc_attr
 */
function esc_attr($text) {
	return $text;
}

/**
 * Mock esc_html
 */
function esc_html($text) {
	return $text;
}

/**
 * Mock sanitize_text_field
 */
function sanitize_text_field($text) {
	return $text;
}

/**
 * Mock wp_create_nonce
 */
function wp_create_nonce($action) {
	return substr(md5($action), -12, 10);
}

/**
 * Mock wp_referer_field()
 */
function wp_referer_field($x) {
	return '<input type="hidden" name="_wp_http_referer" value="my-url" />';
}

/**
 * Mock wp_verify_nonce
 */
function wp_verify_nonce( $nonce, $action = '') {
	return $nonce == substr(md5($action), -12, 10);
}

/**
 * Mock wp_unslash
 */
function wp_unslash($text) {
	return $text;
}
