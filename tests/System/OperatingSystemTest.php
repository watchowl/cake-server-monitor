<?php
/**
 * Created by Li
 * Website: www.watchowl.io
 * Email: welcome@watchowl.io
 * Date: 2/10/17
 * Time: 7:32 PM
 */

namespace WatchOwl\CakeServerMonitor\Test\System;


use WatchOwl\CakeServerMonitor\CommandDefinition\CommandDefinition;
use WatchOwl\CakeServerMonitor\System\OperatingSystem;

class OperatingSystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OperatingSystem
     */
    public $operatingSystem;

    public function setUp()
    {
        parent::setUp();
        $this->operatingSystem = new OperatingSystem();
    }

    public function testRun()
    {
        $commandDefinition = $this->createMock(CommandDefinition::class);

        $commandDefinition
            ->expects($this->once())
            ->method('rawCommand')
            ->willReturn('');

        $this->operatingSystem->execute($commandDefinition);
    }

}