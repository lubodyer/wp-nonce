<?php
/**
 * WordPress plugin providing oversimplified nonce signatures.
 *
 * @package LuboDyer\WpNonces
 */

namespace LuboDyer\WpNonces;

/**
 * WordPress Nonce
 */
class WpNonce
{
    /**
     * Nonce action.
     *
     * @var string $action Nonce action.
     */
    private $action;

    /**
     * Nonce request name.
     *
     * @var string $name Nonce request name.
     */
    private $name;

    /**
     * Constructs the object.
     *
     * @param string $action Optional. Nonce action.
     * @param string $name Optional. Nonce request name. Defaults to "_wpnonce".
     */
    public function __construct($action = '', $name = '_wpnonce') {
        
        $this->action = is_string($action) ? $action : '';
        $this->name = is_string($name) ? $name : '_wpnonce';
    }

    /**
     * Nonce generation.
     *
     * @return string Nonce value.
     */
    public function __toString() {

        return wp_create_nonce($this->action);
    }
    
    /**
     * Get nonce action.
     *
     * @return string $action Nonce action.
     */
    public function action() {
        
        return $this->action;
    }

    /**
     * Generate HTML hidden inputs.
     *
     * @param string $referer Optional. Iclude referer. Defaults to true.
     * @return string The nonce hidden field.
     */
    public function toHTML($referer = true) {

        return sprintf('<input type="hidden" id="%s" name="%s" value="%s"/>', $this->name, $this->name, (string) $this) .
                ($referer ? wp_referer_field(false) : '');
    }
    
    /**
     * Generate URL.
     *
     * @param string $url The URL value to set.
     * @return string The URL with nonce action added.
     */
    public function toURL($url) {

        return esc_html(add_query_arg($this->name, (string) $this, str_replace( '&amp;', '&', $url)));
    }
    
    /**
     * Validate nonce value.
     *
     * @param string $nonce The nonce value.
     * @return bool 
     */
    public function validate($nonce) {

        return wp_verify_nonce($nonce, $this->action()) !== false;
    }
}
