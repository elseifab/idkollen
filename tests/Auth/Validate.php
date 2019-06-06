<?php

namespace ElseifAB\Tests\IDKollen\Auth;

class Validate extends \WP_UnitTestCase
{
    public function testSocialSecurityNumber()
    {
        $this->assertFalse(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber(''));
        $this->assertFalse(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('123'));
        $this->assertFalse(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('8112189877'));
        $this->assertTrue(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('8112189876'));
        $this->assertTrue(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('198112189876'));
    }

}