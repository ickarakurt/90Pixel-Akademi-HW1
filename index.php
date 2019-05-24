<?php

use Symfony\Component\Console\Application;
use App\CreateUserCommand;

require_once __DIR__ . '/vendor/autoload.php';

$application = new Application('90Pixel Homework 1', '1.0.0');
$command = new CreateUserCommand();
$application->add($command);


$application->run();