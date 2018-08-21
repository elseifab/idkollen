<?php

namespace ElseifAB\Tests\IDKollen\Auth;

use ElseifAB\IDKollen\Auth\Paths;

class Callback extends \WP_UnitTestCase
{

    /**
     * Test REST Server
     *
     * @var WP_REST_Server
     */
    protected $server;

    protected $namespaced_route = '/' . Paths::MAIN_URL . '/callback';

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
        $this->assertArrayHasKey($this->namespaced_route, $routes);
    }

    public function testCallbackPath()
    {
        $request = new \WP_REST_Request('POST', $this->namespaced_route);

        $request->set_header('content_type', 'application/json');

        $request->set_body(json_encode([
            'itemId' => 'idkollen-unit-test',
            'idkToken' => 'LCa0a2j/xo/5m0U8HTBBNBNCLXBkg7+g+YpeiGJm564=',
        ]));

        /** @var \WP_REST_Response $response */
        $response = $this->server->dispatch($request);

        $this->assertEquals(200, $response->get_status());
        $this->assertEquals($response->data['result'], 'success');
    }

}