<?php

use \Cake\Core\Configure;

Configure::write(
    'CakeServerMonitor.commands',
    [
        'disk_space' => 'WatchOwl\CakeServerMonitor\CommandDefinition\DiskSpace',
        'mysql' => 'WatchOwl\CakeServerMonitor\CommandDefinition\MySql',
        'nginx' => 'WatchOwl\CakeServerMonitor\CommandDefinition\Nginx',
        'php5fpm' => 'WatchOwl\CakeServerMonitor\CommandDefinition\Php5Fpm',
    ]
);

Configure::write(
    'CakeServerMonitor.email',
    [
        'profile' => 'default',
        'recipients' => []
    ]
);
