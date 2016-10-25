<?php
require 'vendor/autoload.php';

define('DEBUG', true);

//slim config
$config = [];
if (DEBUG === true){
    $config['settings'] = [
        'displayErrorDetails' => true
    ];
}


//create slim app
$app = new \Slim\App($config);


//get slim container
$container = $app->getContainer();

//register view system with slim
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('views/');
};
$container['renderer'] = new \Slim\Views\PhpRenderer("./views");


//load bootstrapper
include_once('services/bootstrapper.php');

$app->run();