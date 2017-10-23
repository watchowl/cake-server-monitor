<?php
/**
 * Created by Li
 * Website: www.watchowl.io
 * Email: welcome@watchowl.io
 * Date: 2/10/17
 * Time: 7:32 PM
 */

namespace WatchOwl\CakeServerMonitor\CommandDefinition;

abstract class CommandDefinition
{
    /**
     * @param string $output
     * @return bool resolved result
     */
    public abstract function resolve($output);

    /**
     * @return string success message
     */
    public abstract function getSuccessMsg();

    /**
     * @return string fail message
     */
    public abstract function getFailMsg();

    /**
     * @return string command to run on OS
     */
    public abstract function rawCommand();
}