<?php

$app->get('/', function ($request, $response) {
    $viewData['welcomeMessage'] = 'Hello Everyone';
    return $this->renderer->render($response, 'homepage.phtml', $viewData);
});

//default page handler
$app->get('/{page}', function ($request, $response, $args) use ($app) {
    $pageName = $args['page'].'.phtml';
    if(file_exists(VIEW_DIRECTORY.$pageName)){
        return $this->renderer->render($response, $pageName);
    } else {
        throw new \Slim\Exception\NotFoundException($request, $response);
    }
});