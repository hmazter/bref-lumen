<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/** @var \Laravel\Lumen\Routing\Router $router */

use Psr\Log\LoggerInterface;

$router->get('/', function (LoggerInterface $logger) use ($router) {
    $hostname = gethostname();
    $publicIp = trim(file_get_contents('https://icanhazip.com/'));

    $logger->info('Logging request', ['hostname' => $hostname, 'public ip' => $publicIp]);

    return response()->json([
        'hostname' => $hostname,
        'public IP' => $publicIp
    ]);
});
