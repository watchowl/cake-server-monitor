<?php
/**
 * Created by PhpStorm.
 * User: xu
 * Date: 20/10/17
 * Time: 6:23 AM
 */

namespace WatchOwl\CakeServerMonitor\CheckCommand;


use WatchOwl\CakeServerMonitor\CommandDefinition\CommandDefinition;
use WatchOwl\CakeServerMonitor\System\OperatingSystem;

class CheckCommand
{
    private $operatingSystem;

    /**
     * CheckCommand constructor.
     * @param $operatingSystem
     */
    public function __construct(OperatingSystem $operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;
    }

    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    public function setOperatingSystem(OperatingSystem $operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;
    }

    public function run(CommandDefinition $commandDefinition)
    {
        $result = $this->operatingSystem->execute($commandDefinition);

        if ($commandDefinition->resolve($result)) {
            $commandDefinition->getSuccessMsg();
            return true;
        }

        if (!$commandDefinition->resolve($result)) {
            $commandDefinition->getFailMsg();
            return false;
        }
    }
}