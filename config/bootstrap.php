<?php

use \Cake\Core\Configure;
use WatchOwl\CakeServerMonitor\CommandDefinition\DiskSpace;

Configure::write('CakeServerMonitor.commands', [
    'diskspace' => DiskSpace::class
]);
