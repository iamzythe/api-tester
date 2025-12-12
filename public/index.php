<?php

// Suppress deprecated warnings on PHP > 7.4
if (PHP_VERSION_ID > 70400) {
    error_reporting(E_ALL & ~E_DEPRECATED);
}

require __DIR__ . '/../vendor/autoload.php';

$config = json_decode(file_get_contents(__DIR__ . '/../config.json'), true);

$app = new \Slim\App();

// API endpoint: GET /api/status
$app->get('/api/status', function ($request, $response, $args) {
    $data = ['status' => 'OK', 'message' => 'API is running'];
    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
});
// API local tunneling
$app->any('/tunnel/{id:.*}', function ($request, $response, $args) use ($config) {
    try {
        if (!$config['localhost']['enabled']) {
            return $response->withStatus(403)->write(json_encode(['error' => 'Local tunneling is disabled']));
        }
        
        $id = $args['id'];
        $parts = explode('/', $id);
        $tunnel_name = $parts[0];
        
        if (!isset($config['localhost']['tunnels'][$tunnel_name])) {
            return $response->withStatus(404)->write(json_encode(['error' => 'Tunnel not found']));
        }
        
        $target_url = $config['localhost']['tunnels'][$tunnel_name]['target_url'];
        $remaining_path = implode('/', array_slice($parts, 1));
        if ($remaining_path) {
            $target_url .= '/' . $remaining_path;
        }
        
        $method = $request->getMethod();
        $queryParams = $request->getQueryParams();
        
        // Add query parameters if any
        if (!empty($queryParams)) {
            $target_url .= '?' . http_build_query($queryParams);
        }
        
        // Get request body for POST/PUT/PATCH
        $body = '';
        if (in_array($method, ['POST', 'PUT', 'PATCH'])) {
            $body = (string)$request->getBody();
        }
        
        // Get headers from the original request
        $headers = [];
        foreach ($request->getHeaders() as $name => $values) {
            // Skip certain headers that shouldn't be forwarded
            if (!in_array(strtolower($name), ['host', 'content-length', 'content-type'])) {
                $headers[] = $name . ': ' . implode(', ', $values);
            }
        }
        
        // Initialize cURL
        $ch = curl_init();
        
        curl_setopt_array($ch, [
            CURLOPT_URL => $target_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
        ]);
        
        // Execute the request
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
        $error = curl_error($ch);
        
        curl_close($ch);
        
        if ($error) {
            return $response->withStatus(500)->write(json_encode([
                'error' => 'Tunneling request failed',
                'details' => $error
            ]));
        }
        
        // Set the response
        $response = $response->withStatus($httpCode);
        
        if ($contentType) {
            $response = $response->withHeader('Content-Type', $contentType);
        }
        
        $response->getBody()->write($result);
        
        return $response;
    } catch (Exception $e) {
        return $response->withStatus(500)->write(json_encode([
            'error' => 'Tunneling error',
            'details' => $e->getMessage()
        ]));
    }
});

// Proxy endpoint for local API testing
$app->any('/proxy/{path:.*}', function ($request, $response, $args) {
    try {
        $path = $args['path'];
        $method = $request->getMethod();
        $queryParams = $request->getQueryParams();

        // Build the target URL (adjust the base URL as needed)
        $baseUrl = 'http://127.0.0.1:19082';
        $targetUrl = $baseUrl . '/' . $path;

        // Add query parameters if any
        if (!empty($queryParams)) {
            $targetUrl .= '?' . http_build_query($queryParams);
        }

        // Get request body for POST/PUT/PATCH
        $body = '';
        if (in_array($method, ['POST', 'PUT', 'PATCH'])) {
            $body = (string)$request->getBody();
        }

        // Get headers from the original request
        $headers = [];
        foreach ($request->getHeaders() as $name => $values) {
            // Skip certain headers that shouldn't be forwarded
            if (!in_array(strtolower($name), ['host', 'content-length', 'content-type'])) {
                $headers[] = $name . ': ' . implode(', ', $values);
            }
        }

        // Initialize cURL
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $targetUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
        ]);

        // Execute the request
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
        $error = curl_error($ch);

        curl_close($ch);

        if ($error) {
            return $response->withStatus(500)->write(json_encode([
                'error' => 'Proxy request failed',
                'details' => $error
            ]));
        }

        // Set the response
        $response = $response->withStatus($httpCode);

        if ($contentType) {
            $response = $response->withHeader('Content-Type', $contentType);
        }

        $response->getBody()->write($result);

        return $response;
    } catch (Exception $e) {
        return $response->withStatus(500)->write(json_encode([
            'error' => 'Proxy error',
            'details' => $e->getMessage()
        ]));
    }
});

// Catch-all route for views
$app->get('/{path:.*}', function ($request, $response, $args) use ($app) {
    $path = $args['path'];
    if ($path == '') {
        $path = 'index';
    }
    $file = __DIR__ . '/../views/' . $path . '.php';
    if (file_exists($file)) {
        // Capture the output of the included file
        ob_start();
        include $file;
        $content = ob_get_clean();

        $response->getBody()->write($content);
        return $response->withHeader('Content-Type', 'text/html');
    } else {
        return $response->withStatus(404)->write('View not found');
    }
});
$app->run();
