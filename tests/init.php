<?php

use Cake\Core\Plugin;

require dirname(__DIR__) . '/vendor/autoload.php';

define('ROOT', dirname(__DIR__) . DS);

Plugin::load('Watchowl/CakeServerMonitor', [
    'bootstrap' => true,
    'path' => ROOT
]);
