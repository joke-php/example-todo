# Список задач 

Демонстрационное приложение списка задач созданное с использованием [фреймворка Joke](https://github.com/Voral/joke).

## Требования

- PHP 8.4 или новее
- Composer
- Фреймворк Joke версия 1.x, начиная с 1.1

## Возможности
- Добавлять задачи
- Удалять задачи
- Отмечать выполненные задачи
- Хранение списка задач в файле JSON (`./data/todos.json`)

## Описание

Это минимальное приложение "Список задач", демонстрирующее:
- Ручную настройку маршрутов
- Использование DI-контейнера
- Наличие CSRF-защиты

## Быстрый старт

```bash
git clone https://github.com/Voral/joke-example-todo.git
cd joke-example-todo
composer install 
composer run dev
```

Откройте в браузере: [http://localhost:8000](http://localhost:8000)

---

Подробнее о фреймворке — [Документация Joke](https://github.com/Voral/joke/blob/master/docs/index.md)