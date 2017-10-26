<?php
/**
 * Created by PhpStorm.
 * User: xu
 * Date: 26/10/17
 * Time: 8:09 PM
 */

namespace WatchOwl\CakeServerMonitor\CommandDefinition;


class MySql extends CommandDefinition
{
    public function resolve($output)
    {
        return !empty($output);
    }

    public function getSuccessMsg()
    {
        return 'MySql is running fine';
    }

    public function getFailMsg()
    {
        return 'MySql has stopped running';
    }

    public function rawCommand()
    {
        return 'ps -e | grep mysqld$';
    }
}
