<?php
/**
 * Created by Li
 * Website: www.watchowl.io
 * Email: welcome@watchowl.io
 * Date: 2/10/17
 * Time: 7:32 PM
 */

namespace WatchOwl\CakeServerMonitor\Shell;

use Cake\Console\Shell;

use Cake\Core\Configure;
use WatchOwl\CakeServerMonitor\System\OperatingSystem;

class MonitorShell extends Shell
{
    /**
     * @var OperatingSystem
     */
    private $operatingSystem;

    /**
     * @var array $commands list of commands
     */
    private $commands = [];

    public function initialize()
    {
        parent::initialize();

        $commands = (array)Configure::read('CakeServerMonitor.commands');

        $this->commands = array_map(function ($namespaceClassName) {
            return new $namespaceClassName();
        }, $commands);
    }

    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        $parser->addSubcommand('run', [
            'parser' => [
                'description' => [
                    __('Start the server monitor'),
                ]
            ]
        ]);

        $parser->addSubcommand('view', [
            'parser' => [
                'description' => [
                    __('View the monitor stats'),
                ]
            ]
        ]);

        return $parser;
    }

    public function main()
    {
        $this->out($this->OptionParser->help());
    }

    /**
     * @return array list of commands
     */
    public function getCommands()
    {
        return $this->commands;
    }

    public function run()
    {
        
    }

    public function view()
    {

    }
}
