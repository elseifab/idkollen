<?php

namespace ElseifAB\Tests\IDKollen\Auth;

class ApiKeyManager extends \WP_UnitTestCase
{
    public function testSetAndGet()
    {

        \ElseifAB\IDKollen\API\ApiKeyManager::set('123456');
        $this->assertEquals(\ElseifAB\IDKollen\API\ApiKeyManager::get(), '123456');

    }
}