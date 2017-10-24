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
    private $msg;

    /**
     * @param CommandDefinition $command command to check
     * @return boolean result of checking
     */
    public function check(CommandDefinition $command)
    {
        $result = $this->execute($command);

        if ($command->resolve($result)) {
            $this->msg = $command->getSuccessMsg();
            return true;
        }

        $this->msg = $command->getFailMsg();
        return false;
    }

    /**
     * @param CommandDefinition $command command to be executed
     * @return string result of running the command
     */
    public function execute(CommandDefinition $command)
    {
        return shell_exec($command->rawCommand());
    }

    /**
     * @return string msg fail/success
     */
    public function getMsg()
    {
        return $this->msg;
    }
}