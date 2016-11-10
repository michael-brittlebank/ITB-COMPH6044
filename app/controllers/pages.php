<?php

//homepage
$app->get('/', function ($request, $response) {
    $viewData['pageTitle'] = 'Homepage';
    $viewData['viewsDirectory'] = VIEW_DIRECTORY;
    return $this->renderer->render($response, 'homepage.phtml', $viewData);
});

//default page handler
$app->get('/{page}', function ($request, $response, $args) use ($app) {
    $pageName = $args['page'];
    $viewData['pageTitle'] = ucwords($pageName);
    $viewData['viewsDirectory'] = VIEW_DIRECTORY;
    $fileName = $pageName.'.phtml';
    if(file_exists(VIEW_DIRECTORY.$fileName)){
        return $this->renderer->render($response, $fileName, $viewData);
    } else {
        throw new \Slim\Exception\NotFoundException($request, $response);
    }
});

//
$app->get('/{page}/{page2}', function ($request, $response, $args) use ($app) {
    $pageName = $args['page'];
    $viewData['pageTitle'] = ucwords($pageName);
    $fileName = $pageName.'.phtml';
    $viewData['viewsDirectory'] = VIEW_DIRECTORY;
    if(file_exists(VIEW_DIRECTORY.$fileName)){
        return $this->renderer->render($response, $fileName, $viewData);
    } else {
        throw new \Slim\Exception\NotFoundException($request, $response);
    }
});