<?php
/**
 * Created by PhpStorm.
 * User: xu
 * Date: 26/10/17
 * Time: 8:16 PM
 */

namespace WatchOwl\CakeServerMonitor\Test\CommandDefinition;

use WatchOwl\CakeServerMonitor\CommandDefinition\Nginx;

class NginxTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Nginx
     */
    private $nginx;

    public function setUp()
    {
        parent::setUp();
        $this->nginx = new Nginx();
    }

    public function testResolve()
    {
        $output =
            ' 5642 ?        00:00:00 nginx' . "\n" .
            ' 5644 ?        00:15:57 nginx' . "\n" .
            ' 5645 ?        00:00:42 nginx';
        $result = $this->nginx->resolve($output);
        $this->assertTrue($result);

        $output = '';
        $result = $this->nginx->resolve($output);
        $this->assertFalse($result);
    }

    public function testRawCommand()
    {
        $result = $this->nginx->rawCommand();

        $expected = 'ps -e | grep nginx$';

        $this->assertEquals($expected, $result);
    }
}
