<?php
/**
 * Created by PhpStorm.
 * User: xu
 * Date: 26/10/17
 * Time: 8:10 PM
 */

namespace WatchOwl\CakeServerMonitor\Test\CommandDefinition;

use WatchOwl\CakeServerMonitor\CommandDefinition\MySql;

class MySqlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MySql
     */
    private $mySql;

    public function setUp()
    {
        parent::setUp();
        $this->mySql = new MySql();
    }

    public function testResolve()
    {
        $output = '3465 ?        04:02:44 mysqld';
        $result = $this->mySql->resolve($output);
        $this->assertTrue($result);

        $output = '';
        $result = $this->mySql->resolve($output);
        $this->assertFalse($result);
    }

    public function testRawCommand()
    {
        $result = $this->mySql->rawCommand();

        $expected = 'ps -e | grep mysqld$';

        $this->assertEquals($expected, $result);
    }
}

