<?php

namespace LuboDyer\WpNonces\Test;

use LuboDyer\WpNonces\WpNonce;
use PHPUnit\Framework\TestCase;

/**
 * Tests for class Nonce_Validator.
 */
class WpNonceTest extends TestCase
{
    /**
      * Test action.
     *
     * @var string $test_action The default test action value.
      */
    private $test_action;

    /**
     * Test nonce object.
     *
     * @var object $test_nonce The nonce object.
     */
    private $test_nonce;

    /**
     * Test nonce value.
     *
     * @var string $test_value The nonce value.
     */
    private $test_value;

    /**
     * Setting up the test environment.
     */
    protected function setUp() {

        $this->test_action = 'action';
        $this->test_nonce = new WpNonce($this->test_action);
        $this->test_value = \LuboDyer\WPNonces\wp_create_nonce($this->test_action);
    }

    /**
     * Test instance
     */
    public function test_instance() {

        $this->assertInstanceOf(WpNonce::class, $this->test_nonce);
    }

    /**
     * Test action
     */
    public function test_action() {

        $this->assertSame($this->test_action, $this->test_nonce->action());

        $nonce = new WpNonce('new_action');
        $this->assertSame('new_action', $nonce->action());
    }

    /**
     * Test nonce value
     */
    public function test_nonce() {
        $this->assertSame($this->test_value, (string) $this->test_nonce);
    }

    /**
     * Test the validate_nonce method used for the straight validation of the nonce.
     */
    public function test_validate() {

        $this->assertTrue($this->test_nonce->validate($this->test_value));
        $this->assertFalse($this->test_nonce->validate($this->test_value . 'error'));
    }

}
