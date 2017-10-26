<?php
/**
 * Created by PhpStorm.
 * User: xu
 * Date: 26/10/17
 * Time: 8:24 PM
 */

namespace WatchOwl\CakeServerMonitor\Test\CommandDefinition;

use WatchOwl\CakeServerMonitor\CommandDefinition\Php5Fpm;

class Php5FpmTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Php5Fpm
     */
    private $php5Fpm;

    public function setUp()
    {
        parent::setUp();
        $this->php5Fpm = new Php5Fpm();
    }

    public function testResolve()
    {
        $output =
            '18197 ?        00:07:37 php5-fpm' . "\n" .
            '21233 ?        00:00:01 php5-fpm' . "\n" .
            '21234 ?        00:00:01 php5-fpm';

        $result = $this->php5Fpm->resolve($output);
        $this->assertTrue($result);

        $output = '';
        $result = $this->php5Fpm->resolve($output);
        $this->assertFalse($result);
    }

    public function testRawCommand()
    {
        $result = $this->php5Fpm->rawCommand();

        $expected = 'ps -e | grep fpm$';

        $this->assertEquals($expected, $result);
    }
}
