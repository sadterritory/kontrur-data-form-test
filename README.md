# Kontur - Тестовое задание

[sadterritory]: https://github.com/sadterritory
![Postgres](https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white)
![PhpStorm](http://img.shields.io/badge/-PHPStorm-181717?style=for-the-badge&logo=phpstorm&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=Composer&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E)

> Created by [@sadterritory][sadterritory]

## Оглавление

1. [Цель проекта](#Цель-проекта)
2. [Задачи и требования проекта](#Задачи-и-требования-проекта)
3. [Сборка проекта](#Сборка-проекта)

## Цель проекта

Реализация формы сбора контактных данных пользователей с валидацией, сохранением в БД и автоматической отправкой уведомления администратору.

## Задачи и требования проекта

### Основные сущности

- **Модель**: `UserData` (хранит имя, телефон и email пользователей)
- **Почтовый класс**: `UserDataMail` (отправка данных администратору)
- **Контроллер**: `UserDataController` (обработка CRUD-операций)
- **Маршруты**: Полный RESTful роутинг для работы с пользовательскими данными


### Технические особенности

- Валидация полей формы (обязательные поля: имя, телефон, email)
- AJAX-отправка данных формы
- Интеграция с SMTP (Mail.ru) для отправки писем
- Реализация без использования Docker


## Сборка проекта

```bash
# 0. Clone
git clone <repository-url>

cd <project-directory>

# 1. Set Up .env
cp .env.example .env
# Отредактируйте .env (особенно секцию MAIL (необходимо вставить свои данные))

# 2. Migrate
php artisan migrate

# 3 Run locally 
php artisan serve
```