<?php

namespace ElseifAB\Tests\IDKollen\Auth;

use ElseifAB\IDKollen\Auth\Paths;

class Validate extends \WP_UnitTestCase
{
    public function testSocialSecurityNumber()
    {
        $this->assertFalse(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber(''));
        $this->assertFalse(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('123'));
        $this->assertFalse(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('19690313222'));
        $this->assertTrue(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('6903131735'));
        $this->assertTrue(\ElseifAB\IDKollen\Auth\Validate::socialSecurityNumber('196903131735'));
    }

}