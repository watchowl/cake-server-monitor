<?php

use \Cake\Core\Configure;
use WatchOwl\CakeServerMonitor\CommandDefinition\DiskSpace;

Configure::write(
    'CakeServerMonitor.commands',
    ['disk_space' => DiskSpace::class]
);

Configure::write(
    'CakeServerMonitor.email',
    [
        'profile' => 'default',
        'recipients' => ['test@gmail.com']
    ]
);
