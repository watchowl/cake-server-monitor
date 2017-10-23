<?php
/**
 * Created by Li
 * Website: www.watchowl.io
 * Email: welcome@watchowl.io
 * Date: 2/10/17
 * Time: 7:32 PM
 */

namespace WatchOwl\CakeServerMonitor\System;


use WatchOwl\CakeServerMonitor\CommandDefinition\CommandDefinition;

class OperatingSystem
{
    public function execute(CommandDefinition $commandDefinition)
    {
        return shell_exec($commandDefinition->rawCommand());
    }
}