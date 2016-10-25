<?php 

//controllers
$controllerPath = 'controllers';
$controllerFiles = [
    'client.php'
];

//load files
foreach($controllerFiles as $controller){
    $filePath = join('/',[$controllerPath, $controller]);
    include_once($filePath);
}