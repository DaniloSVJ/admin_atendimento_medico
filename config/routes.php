<?php


use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {

    $builder->connect('/', ['controller' => 'Atendimento', 'action' => 'naoAtendidos']);
    $builder->connect('/atender/:id', ['controller' => 'Atendimento', 'action' => 'view'], ['pass' => ['id'], 'id' => '\d+']);
    $builder->connect('/listamedicos', ['controller' => 'ListaDeMedicos', 'action' => 'index']);
    $builder->connect('/agenda', ['controller' => 'Atendimento', 'action' => 'naoAtendidos']);
    $builder->connect('/atendidos', ['controller' => 'Atendimento', 'action' => 'atendidos']);
    $builder->connect('/finalizar', ['controller' => 'Atendimento', 'action' => 'finalizar']);
    $builder->connect('/verificar/:id', ['controller' => 'Atendimento', 'action' => 'review'], ['pass' => ['id'], 'id' => '\d+']);

    $builder->fallbacks();

});

/*
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * $routes->scope('/api', function (RouteBuilder $builder) {
 *     // No $builder->applyMiddleware() here.
 *
 *     // Parse specified extensions from URLs
 *     // $builder->setExtensions(['json', 'xml']);
 *
 *     // Connect API actions here.
 * });
 * ```
 */
