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

class TestCommand extends CommandDefinition
{
    public function resolve($output)
    {
        return true;
    }

    public function getSuccessMsg()
    {
        return null;
    }

    public function getFailMsg()
    {
        return null;
    }

    public function rawCommand()
    {
        return 'ls -al';
    }

}

class OperatingSystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OperatingSystem
     */
    public $operatingSystem;

    public function setUp()
    {
        parent::setUp();
    }

    public function testCheck()
    {
        // Arrange
        $mockCommand = $this->createMock(
            TestCommand::class
        );

        $mockCommand
            ->expects($invoke = $this->any())
            ->method('resolve')
            ->willReturn(false);

        $this->operatingSystem = $this
            ->getMockBuilder(OperatingSystem::class)
            ->setMethods(['execute'])
            ->getMock();

        // Act
        $result = $this->operatingSystem->check($mockCommand);

        // Assert
        $this->assertFalse($result);
        $this->assertSame(1, $invoke->getInvocationCount());
        $this->assertSame($mockCommand->getFailMsg(), $this->operatingSystem->getMsg());
    }

    public function testRun()
    {
        $this->operatingSystem = new OperatingSystem(
            []
        );

        $testCommand = new TestCommand();

        $result = $this->operatingSystem->execute($testCommand);

        $this->assertNotEmpty($result);
    }

}