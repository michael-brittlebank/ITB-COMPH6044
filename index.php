<?php
require 'vendor/autoload.php';

$app = new \Slim\App;

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('views/');
};

//load bootstrapper
include_once('services/bootstrapper.php');

$app->run();