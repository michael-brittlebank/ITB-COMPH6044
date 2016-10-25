<?php

$app->get('/', function ($request, $response) {
    $viewData['welcomeMessage'] = 'Hello Everyone';
    $response = $this->view->render($response, "homepage.phtml", $viewData);
    return $response;
});