# Список задач 

Демонстрационное приложение списка задач созданное с использованием [фреймворка Joke](https://github.com/Voral/joke).

## Требования

- PHP 8.5 или новее
- Фреймворк Joke версия 2.x

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

По созданию данного приложения можно посмотреть видео: [VkVideo](https://vkvideo.ru/video-178354982_456239018) и [Youtube](https://youtu.be/M6CezBYRZ54)

## Быстрый старт

```bash
git clone https://github.com/joke-php/example-todo.git
cd example-todo
composer install 
composer run dev
```

Откройте в браузере: [http://localhost:8000](http://localhost:8000)

---

Подробнее о фреймворке — [Документация Joke](https://github.com/Voral/joke/blob/master/docs/index.md)