<?php

//homepage
$app->get('/', function ($request, $response) {
    $viewData['metaTitle'] = 'Zero Trouble';
    $viewData['pageTitle'] = '';
    $viewData['viewsDirectory'] = VIEW_DIRECTORY;
    return $this->renderer->render($response, 'homepage.phtml', $viewData);
});

//default page handler
$app->get('/{page}', function ($request, $response, $args) use ($app) {
    $pageName = strtolower($args['page']);
    $fileName = $pageName.'.phtml';
    if(file_exists(join('/',[VIEW_DIRECTORY,$fileName]))){
        $viewData['metaTitle'] = META_TITLE_PREFIX.ucwords(str_replace('-',' ',$pageName));
        $viewData['pageTitle'] = ucwords(str_replace('-',' ',$pageName));
        $viewData['activePage'] = $pageName;
        $viewData['viewsDirectory'] = VIEW_DIRECTORY;
        return $this->renderer->render($response, $fileName, $viewData);
    } else {
        throw new \Slim\Exception\NotFoundException($request, $response);
    }
});

//subdirectory pages
$app->get('/{directory}/{page}', function ($request, $response, $args) use ($app) {
    $pageName = strtolower($args['page']);
    $directoryName = strtolower($args['directory']);
    $fileName = $pageName.'.phtml';
    $viewTemplate = join('/',[$directoryName,$fileName]);
    if(file_exists(join('/',[VIEW_DIRECTORY,$viewTemplate]))){
        $viewData['metaTitle'] = META_TITLE_PREFIX.ucwords(str_replace('-',' ',$pageName));
        $viewData['pageTitle'] = ucwords(str_replace('-',' ',$pageName));
        $viewData['activePage'] = $directoryName;
        $viewData['viewsDirectory'] = VIEW_DIRECTORY;
        return $this->renderer->render($response, $viewTemplate, $viewData);
    } else {
        throw new \Slim\Exception\NotFoundException($request, $response);
    }
});