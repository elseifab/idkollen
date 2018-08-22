<?php

namespace ElseifAB\Tests\IDKollen\Auth;

class Responses extends \WP_UnitTestCase
{
    public function testNotValidSocialResponse() {
        $response = \ElseifAB\IDKollen\Auth\Responses::notValidSocial('123');
        $this->assertEquals($response->data['pno'], '123');
    }

    public function testInitErrorResponse() {
        $response = \ElseifAB\IDKollen\Auth\Responses::initError(new \WP_Error(500, 'fel'));
        $this->assertEquals($response->data['result'], 'INITIAL_ERROR');
    }

    public function testClientTimeoutResponse() {
        $response = \ElseifAB\IDKollen\Auth\Responses::clientTimeout();
        $this->assertEquals($response->data['result'], 'TIMEOUT_ERROR');
    }

    public function testSuccessResponse() {
        $response = \ElseifAB\IDKollen\Auth\Responses::success('123');
        $this->assertEquals($response->data['result'], 'success');
        $this->assertEquals($response->data['token'], '123');
    }
}
