<?php

namespace ElseifAB\Tests\IDKollen\Auth;

use ElseifAB\IDKollen\Auth\Paths;

class Init extends \WP_UnitTestCase
{

    /**
     * Test REST Server
     *
     * @var WP_REST_Server
     */
    protected $server;

    protected $initUri = '/' . Paths::MAIN_URL . '/auth';

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
        $this->assertArrayHasKey($this->initUri, $routes);
    }

    public function testInit()
    {
        $request = new \WP_REST_Request('POST', $this->initUri);

        $request->set_param('pno', '198112189876');

        $response = $this->server->dispatch($request);

        $this->assertEquals(200, $response->get_status());
        //$this->assertEquals($response->data['result'], 'success');
    }

}