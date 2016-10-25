<?php

$app->get('/', function ($request, $response) {
    $viewData['welcomeMessage'] = 'Hello Everyone';
    return $this->renderer->render($response, "homepage.phtml", $viewData);
});