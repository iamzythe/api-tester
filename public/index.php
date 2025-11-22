<?php

// Suppress deprecated warnings on PHP > 7.4
if (PHP_VERSION_ID > 70400) {
    error_reporting(E_ALL & ~E_DEPRECATED);
}

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App();

// API endpoint: GET /api/status
$app->get('/api/status', function ($request, $response, $args) {
    $data = ['status' => 'OK', 'message' => 'API is running'];
    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
});

// Catch-all route for views
$app->get('/{path:.*}', function ($request, $response, $args) {
    $path = $args['path'];
    if ($path == '') {
        $path = 'index';
    }
    $file = __DIR__ . '/../views/' . $path . '.php';
    if (file_exists($file)) {
        include $file;
        return $response;
    } else {
        return $response->withStatus(404)->write('View not found');
    }
});

$app->run();