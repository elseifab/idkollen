<?php

namespace ElseifAB\Tests\IDKollen\Auth;

use ElseifAB\IDKollen\Auth\Paths;

class Routes extends \WP_UnitTestCase
{

    /**
     * Test REST Server
     *
     * @var WP_REST_Server
     */
    protected $server;

    public function setUp()
    {
        parent::setUp();

        /** @var WP_REST_Server $wp_rest_server */
        global $wp_rest_server;
        $this->server = $wp_rest_server = new \WP_REST_Server();
        do_action('rest_api_init');
    }

    public function tearDown()
    {
        parent::tearDown();

        global $wp_rest_server;
        $wp_rest_server = null;
    }

    public function testRegisterRoutes()
    {
        $routes = $this->server->get_routes();
        $this->assertArrayHasKey('/' . Paths::MAIN_URL . '/auth', $routes);
        $this->assertArrayHasKey('/' . Paths::MAIN_URL . '/callback', $routes);
        $this->assertArrayHasKey('/' . Paths::MAIN_URL . '/item/(?P<item>[a-zA-Z0-9-]+)', $routes);
        $this->assertArrayHasKey('/' . Paths::MAIN_URL . '/loop/(?P<item>[a-zA-Z0-9-]+)', $routes);
    }

}
