<?php

use App\Controllers\TodoController;
use Vasoft\Joke\Core\Response\HtmlResponse;
use Vasoft\Joke\Core\Response\ResponseStatus;
use Vasoft\Joke\Core\Routing\Router;

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
    static fn(string $path) => new HtmlResponse()->setStatus(ResponseStatus::NOT_FOUND)->setBody('Not found ' . $path)
);
