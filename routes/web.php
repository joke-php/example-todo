<?php

use App\Controllers\TodoController;
use Vasoft\Joke\Http\Response\ResponseBuilder;
use Vasoft\Joke\Http\Response\ResponseStatus;

/**
 * @var Router $router
 */
$router->get('/', [TodoController::class, 'index']);
$router->get('/todo', [TodoController::class, 'listTodos']);
$router->post('/todo', [TodoController::class, 'createTodos']);
$router->patch('/todo/{id:int}', [TodoController::class, 'complete']);
$router->delete('/todo/{id:int}', [TodoController::class, 'delete']);
$router->get(
    '/{*}',
    static fn(string $path, ResponseBuilder $builder) => $builder->makeDefault()
        ->setStatus(ResponseStatus::NOT_FOUND)
        ->setBody('Not found ' . $path)
);
