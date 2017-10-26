<?php
/**
 * Created by PhpStorm.
 * User: xu
 * Date: 26/10/17
 * Time: 8:15 PM
 */

namespace WatchOwl\CakeServerMonitor\CommandDefinition;


class Nginx extends CommandDefinition
{
    public function resolve($output)
    {
        return !empty($output);
    }

    public function getSuccessMsg()
    {
        return 'Nginx is running fine';
    }

    public function getFailMsg()
    {
        return 'Nginx has stopped running';
    }

    public function rawCommand()
    {
        return 'ps -e | grep nginx$';
    }

}