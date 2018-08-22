<?php

namespace ElseifAB\Tests\IDKollen\Auth;

class Timeout extends \WP_UnitTestCase
{
    public function testSetAndGet()
    {

        \ElseifAB\IDKollen\Settings\Timeout::set('123');
        $this->assertEquals(\ElseifAB\IDKollen\Settings\Timeout::get(), '123');

    }
}