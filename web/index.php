<?php
require_once __DIR__ . '/../silex.phar';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

date_default_timezone_set('Asia/Tokyo');

$app = new Application();

$app->register(new Silex\Provider\DoctrineServiceProvider(), [
    'db.options' => [
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '5432',
        'dbname' => 'pashily_dev',
        'user' => 'pashily',
        'password' => 'u0ZiibnPun88Pq8lyq7qDJGfBPdXzJ2C',
        ],
    'db.dbal.class_path' => __DIR__ . '/vendor/doctrine-dbal'
    'db.common.class_path' => __DIR__ . '/vendor/doctrine-common'
    ]);

$app->get('/jobs', function() use ($app) {
    $requestData = json_decode($app['request']->get('data'));

    $data = [
        ['id' => 1, 'user_id' => null, 'detail' => 'hogehoge', 'limit' => date('Y-m-d H:i:s'), 'budget' => 0],
        ['id' => 2, 'user_id' => 1, 'detail' => 'mogemoge', 'limit' => date('Y-m-d H:i:s'), 'budget' => 1000],
        ['id' => 3, 'user_id' => null, 'detail' => 'fugafuga', 'limit' => date('Y-m-d H:i:s'), 'budget' => 0],
    ];
    return new Response(json_encode($data), 200, ['Content-Type' => 'application/json']);
})
    ;

$app->get('/job/{id}', function($id) use ($app) {
})
    ->assert('id', '\d+')
    ;

$app->post('/job', function() use ($app) {
})
    ;
    
$app->put('/job', function () use ($app) {
})
    ;

$app->get('/user/{id}', function($id) use ($app) {
})
    ;
    
$app->run();
