<?php // console.php

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create('../config');
$dotenv->load();

use Symfony\Component\Console\Application;

/** @var \Interop\Container\ContainerInterface $container */
$container = require '../config/container.php';
$application = new Application('Application console');

$commands = $container->get('config')['console']['commands'];
foreach ($commands as $command) {
    $application->add($container->get($command));
}

$application->run();