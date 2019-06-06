<?php

namespace ElseifAB\Tests\IDKollen\Auth;

class Validate extends \WP_UnitTestCase
{
    public function testEmptySocialSecurityNumber()
    {
        $this->assertFalse(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber(''));
    }

    public function testShortSocialSecurityNumber()
    {
        $this->assertFalse(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('123'));
    }

    public function testToLongSocialSecurityNumber()
    {
        $this->assertFalse(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('811318987712'));
    }

    public function testSocialSecurityNumber()
    {
        $this->assertTrue(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('8112189876'));
    }

    public function testLongValidSocialSecurityNumber()
    {
        $this->assertTrue(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('198112189876'));
    }

}