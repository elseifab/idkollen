<?php

namespace ElseifAB\Tests\IDKollen\Auth;

use ElseifAB\IDKollen\Auth\Paths;

class Item extends \WP_UnitTestCase
{

    /**
     * Test REST Server
     *
     * @var WP_REST_Server
     */
    protected $server;

    protected $itemUri = '/' . Paths::MAIN_URL . '/item';

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

    public function testRegisterRoute()
    {
        $routes = $this->server->get_routes();
        $this->assertArrayHasKey($this->itemUri.'/(?P<item>[a-zA-Z0-9-]+)', $routes);
    }

    public function testInit()
    {
        $request = new \WP_REST_Request('GET', $this->itemUri . '/idkollen-test');

        /** @var \WP_REST_Response $response */
        $response = $this->server->dispatch($request);

        $this->assertEquals(200, $response->get_status());

        $this->assertEquals($response->data, false);

        update_option('idkollen-test', '123456');

        $response = $this->server->dispatch($request);

        $this->assertEquals(200, $response->get_status());

        $this->assertEquals($response->data, '123456');

    }

}