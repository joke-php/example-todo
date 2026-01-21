<?php

namespace App\Controllers;

use Vasoft\Joke\Core\Middlewares\CsrfMiddleware;
use Vasoft\Joke\Core\Request\HttpRequest;
use Vasoft\Joke\Core\Response\HtmlResponse;

class TodoController
{
    private array $todos = [];
    private const string DATA_FILE = '../data/todos.json';
    private const string INDEX_FILE = '../templates/index.html';
    private bool $loaded = false;


    public function index(HttpRequest $request): HtmlResponse
    {
        $html = file_get_contents(self::INDEX_FILE);
        $html = str_replace(
            '#CSRF#',
            $request->session->get(CsrfMiddleware::CSRF_TOKEN_NAME),
            $html
        );
        return new HtmlResponse()->setBody($html);
    }

    private function loadTodos(): void
    {
        if ($this->loaded) {
            return;
        }
        if (file_exists(self::DATA_FILE)) {
            $content = file_get_contents(self::DATA_FILE);
            $this->todos = json_decode($content, true);
        }
        $this->loaded = true;
    }

    private function saveTodos(): void
    {
        file_put_contents(self::DATA_FILE, json_encode($this->todos, JSON_PRETTY_PRINT));
    }

    public function createTodos(HttpRequest $request): array
    {
        $description = $request->post->get('description');
        if ($description === null) {
            $item = [];
        } else {
            $this->loadTodos();
            $item = [
                'id' => $this->getNextId(),
                'description' => $description,
                'completed' => false
            ];
            $this->todos[] = $item;
            $this->saveTodos();
        }
        return $item;
    }

    public function listTodos(): array
    {
        $this->loadTodos();
        return array_values($this->todos);
    }

    public function complete(int $id): void
    {
        $this->loadTodos();
        foreach ($this->todos as &$todo) {
            if ($id === (int)$todo['id']) {
                $todo['completed'] = true;
                $this->saveTodos();
                return;
            }
        }
    }

    public function delete(int $id): void
    {
        $this->loadTodos();
        $this->todos = array_filter($this->todos, fn($item) => (int)$item['id'] !== $id);
        $this->saveTodos();
    }

    private function getNextId(): int
    {
        $id = 0;
        foreach ($this->todos as $todo) {
            $id = max($id, (int)$todo['id']);
        }
        return $id + 1;
    }
}