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

class MonitorShell extends Shell
{

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

    public function checkDiskSpace()
    {

    }

    public function checkCpuUsage()
    {

    }

    public function checkMySql()
    {

    }

    public function checkNginx()
    {

    }

}