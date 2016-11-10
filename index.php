<?php
require 'vendor/autoload.php';
//environment variables
define('DEBUG', true);

//app constants
define('VIEW_DIRECTORY','views/');

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
$container['view'] = function () {
    return new \Slim\Views\PhpRenderer(VIEW_DIRECTORY);
};
$container['renderer'] = new \Slim\Views\PhpRenderer(VIEW_DIRECTORY);


//load bootstrapper
include_once('services/bootstrapper.php');

$app->run();