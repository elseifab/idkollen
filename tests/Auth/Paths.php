<?php

namespace ElseifAB\Tests\IDKollen\Auth;

class Paths extends \WP_UnitTestCase
{

    public function testConstant()
    {
        $this->assertEquals('elseifab/idkollen/v1', \ElseifAB\IDKollen\Auth\Paths::MAIN_URL);
    }

}
