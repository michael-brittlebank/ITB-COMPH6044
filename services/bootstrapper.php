<?php 

//controllers
$controllerPath = 'controllers';
$controllerFiles = [
    'errors.php',
    'client.php'
];

//load files
foreach($controllerFiles as $controller){
    $filePath = join('/',[$controllerPath, $controller]);
    include_once($filePath);
}