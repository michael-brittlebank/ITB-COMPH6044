<?php

/**
 * middleware
 */
$middlewarePath = 'middleware';
$middlewareFiles = [
    'assets',
    'trailing-slash'
];

//load files
foreach($middlewareFiles as $middleware){
    $filePath = join('/',[$_SERVER['DOCUMENT_ROOT'], 'app', $middlewarePath, $middleware.'.php']);
    include_once($filePath);
}


/**
 * controllers
 */
$controllerPath = 'controllers';
$controllerFiles = [
    'errors',
    'pages'
];

//load files
foreach($controllerFiles as $controller){
    $filePath = join('/',[$_SERVER['DOCUMENT_ROOT'], 'app', $controllerPath, $controller.'.php']);
    include_once($filePath);
}