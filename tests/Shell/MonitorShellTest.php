<?php
/**
 * Created by Li
 * Website: www.watchowl.io
 * Email: welcome@watchowl.io
 * Date: 2/10/17
 * Time: 7:32 PM
 */


namespace WatchOwl\CakeServerMonitor\Test;

use Cake\Console\ConsoleIo;
use Cake\Core\Configure;
use Cake\Network\Email\Email;
use WatchOwl\CakeServerMonitor\CommandDefinition\DiskSpace;
use WatchOwl\CakeServerMonitor\Shell\MonitorShell;
use WatchOwl\CakeServerMonitor\System\OperatingSystem;

class MonitorShellTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MonitorShell
     */
    public $MonitorShell;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->io = $this->createMock(ConsoleIo::class);
        $this->MonitorShell = new MonitorShell($this->io);
        $this->MonitorShell->initialize();
    }

    public function testCommandCreation()
    {
        $expected = Configure::read('CakeServerMonitor.commands');

        $commands = $this->MonitorShell->getCommands();

        $commandClasses = array_map(function ($command) {
            return get_class($command);
        }, $commands);

        $this->assertSame($commandClasses, $expected);
    }

    public function testInit()
    {
        Configure::write(
            'CakeServerMonitor.email',
            [
                'profile' => 'default',
                'recipients' => ['test@gmail.com']
            ]
        );
        $email = $this->MonitorShell->getEmail();
        $this->assertInstanceOf(Email::class, $email);
    }

    public function testRun()
    {
        $email = $this->createMock(Email::class);
        $email
            ->expects($this->once())
            ->method('send')
            ->willReturn(true);

        $command = $this->createMock(DiskSpace::class);
        $command
            ->expects($this->any())
            ->method('resolve')
            ->willReturn(false);

        $this->MonitorShell->setEmail($email);
        $this->MonitorShell->setCommands([$command]);
        $this->MonitorShell->run();

        $email = $this->createMock(Email::class);
        $email
            ->expects($this->exactly(0))
            ->method('send')
            ->willReturn(true);

        $command = $this->createMock(DiskSpace::class);
        $command
            ->expects($this->any())
            ->method('resolve')
            ->willReturn(true);

        $this->MonitorShell->setEmail($email);
        $this->MonitorShell->setCommands([$command]);
        $this->MonitorShell->run();
    }

    public function testView()
    {
        $operatingSystem = $this->createMock(OperatingSystem::class);

        $operatingSystem
            ->expects($invoke = $this->any())
            ->method('check')
            ->willReturn(true);

        $this->MonitorShell->setOperatingSystem($operatingSystem);

        $this->MonitorShell->view();

        $this->assertSame(
            count(Configure::read('CakeServerMonitor.commands')),
            $invoke->getInvocationCount()
        );
    }
}
