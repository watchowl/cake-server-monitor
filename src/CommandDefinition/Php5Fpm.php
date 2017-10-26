<?php
/**
 * Created by PhpStorm.
 * User: xu
 * Date: 26/10/17
 * Time: 8:24 PM
 */

namespace WatchOwl\CakeServerMonitor\CommandDefinition;


class Php5Fpm extends CommandDefinition
{
    public function resolve($output)
    {
        return !empty($output);
    }

    public function getSuccessMsg()
    {
        return 'PHP-FPM is running fine';
    }

    public function getFailMsg()
    {
        return 'PHP-FPM has stopped running';
    }

    public function rawCommand()
    {
        return 'ps -e | grep fpm$';
    }

}