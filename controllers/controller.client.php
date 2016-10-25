<?php

$app->get('/', function ($request, $response) {
    $viewData['pageTitle'] = 'Homepage';
    $viewData['welcomeMessage'] = 'Hello Everyone';
    return $this->renderer->render($response, 'homepage.phtml', $viewData);
});

//default page handler
$app->get('/{page}', function ($request, $response, $args) use ($app) {
    $viewData['pageTitle'] = 'Homepage';
    $pageName = $args['page'].'.phtml';
    if(file_exists(VIEW_DIRECTORY.$pageName)){
        return $this->renderer->render($response, $pageName, $viewData);
    } else {
        throw new \Slim\Exception\NotFoundException($request, $response);
    }
});