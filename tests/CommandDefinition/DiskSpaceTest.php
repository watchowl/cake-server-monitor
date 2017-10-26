<?php
/**
 * Created by PhpStorm.
 * User: xu
 * Date: 23/10/17
 * Time: 8:14 PM
 */

namespace WatchOwl\CakeServerMonitor\Test\CommandDefinition;

use WatchOwl\CakeServerMonitor\CommandDefinition\DiskSpace;

class DiskSpaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DiskSpace
     */
    private $diskSpace;

    public function setUp()
    {
        parent::setUp();
        $this->diskSpace = new DiskSpace();
    }

    public function testResolve()
    {
        $output =
                'Filesystem     1024-blocks    Used Available Capacity Mounted on'.
                "\n".
                '/dev/root         24505644 5031028  18213048      22% /';
        $result = $this->diskSpace->resolve($output);
        $this->assertTrue($result);

        $output =
                'Filesystem     1024-blocks    Used Available Capacity Mounted on'.
                "\n".
                '/dev/root         24505644 5031028  18213048      90% /';
        $result = $this->diskSpace->resolve($output);
        $this->assertFalse($result);
    }

    public function testRawCommand()
    {
        $result = $this->diskSpace->rawCommand();

        $expected = 'df -P .';

        $this->assertEquals($expected, $result);
    }
}
