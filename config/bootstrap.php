<?php

use \Cake\Core\Configure;
use WatchOwl\CakeServerMonitor\CommandDefinition\DiskSpace;
use WatchOwl\CakeServerMonitor\CommandDefinition\MySql;
use WatchOwl\CakeServerMonitor\CommandDefinition\Nginx;
use WatchOwl\CakeServerMonitor\CommandDefinition\Php5Fpm;

Configure::write(
    'CakeServerMonitor.commands',
    [
        'disk_space' => DiskSpace::class,
        'mysql' => MySql::class,
        'nginx' => Nginx::class,
        'php5fpm' => Php5Fpm::class,
    ]
);

Configure::write(
    'CakeServerMonitor.email',
    [
        'profile' => 'default',
        'recipients' => ['test@gmail.com']
    ]
);
