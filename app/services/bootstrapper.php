<?php

//controllers
$controllerPath = 'controllers';
$controllerFiles = [
    'errors.php',
    'pages.php'
];

//load files
foreach($controllerFiles as $controller){
    $filePath = join('/',[$_SERVER['DOCUMENT_ROOT'], 'app', $controllerPath, $controller]);
    include_once($filePath);
}