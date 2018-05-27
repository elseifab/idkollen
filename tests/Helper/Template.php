<?php
namespace ElseifAB\Tests\IDKollen\Helper;

class Template extends \WP_UnitTestCase
{

    public function testAdminPageRender()
    {
        $output = \ElseifAB\IDKollen\Helper\Template::render('admin/settings', [
            'headline' => 'This is the Headline',
            'body' => 'This is the body',
            'apiKey' => '123',
            'apiUrl' => 'https://',
            'debug' => 1,
        ]);

        $valid = strpos($output, 'This is the Headline');
        $this->assertTrue($valid>0);

        $valid = strpos($output, 'This is the body');
        $this->assertTrue($valid>0);
    }

}