<?php

use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Mailer\Email;

$findRoot = function ($root) {
    do {
        $lastRoot = $root;
        $root = dirname($root);
        if (is_dir($root . '/vendor/cakephp/cakephp')) {
            return $root;
        }
    } while ($root !== $lastRoot);
    throw new Exception('Cannot find the root of the application, unable to run tests');
};
$root = $findRoot(__FILE__);
unset($findRoot);
require $root . '/vendor/cakephp/cakephp/tests/bootstrap.php';

Email::setConfigTransport([
    'debug' => [
        'className' => 'Debug',
        'additionalParameters' => true
    ]
]);

Email::setConfig([
    'default' => [
        'transport' => 'debug',
        'from' => 'foo@bar.com',
        'log' => false
    ],
]);

Plugin::load('Watchowl/CakeServerMonitor', [
    'bootstrap' => true,
    'path' => dirname(__DIR__) . DS
]);
