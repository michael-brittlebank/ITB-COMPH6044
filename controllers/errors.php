<?php

//404
$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $container['view']
            ->render($response, 'errors/404.phtml')
            ->withStatus(404);
    };
};

//general error
$container['errorHandler'] = function ($container) {
    return function ($request, $response, $exception) use ($container) {
        $viewData = [];
        if (DEBUG){
            $viewData['exception'] = $exception;
        }
        
        return $container['view']
            ->render($response, 'errors/500.phtml', $viewData)
            ->withStatus(500);
    };
};