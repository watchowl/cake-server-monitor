<?php

use \Cake\Core\Configure;

Configure::write('CakeServerMonitor.command', [
    'diskspace' => '\WatchOwl\CakeServerMonitor\CommandDefinition\DiskSpace'
]);
