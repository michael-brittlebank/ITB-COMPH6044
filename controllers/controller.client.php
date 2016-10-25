<?php

//homepage
$app->get('/', function ($request, $response) {
    $viewData['pageTitle'] = 'Homepage';
    return $this->renderer->render($response, 'homepage.phtml', $viewData);
});

//default page handler
$app->get('/{page}', function ($request, $response, $args) use ($app) {
    $pageName = $args['page'];
    $viewData['pageTitle'] = ucwords($pageName);
    $fileName = $pageName.'.phtml';
    if(file_exists(VIEW_DIRECTORY.$fileName)){
        return $this->renderer->render($response, $fileName, $viewData);
    } else {
        throw new \Slim\Exception\NotFoundException($request, $response);
    }
});