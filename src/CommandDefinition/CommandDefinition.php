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
     * @param string $resultStr
     * @return bool
     */
    public abstract function resolve($resultStr);

    public abstract function getSuccessMsg();

    public abstract function getFailMsg();

    public abstract function rawCommand();
}