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
use WatchOwl\CakeServerMonitor\Shell\MonitorShell;

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
}
