# Инструкция по развертыванию EasyKitchen на хостинге

## Проблема с базой данных

Ошибка `SQLSTATE[HY000] [1045] Access denied for user 'root'@'127.0.0.1' (using password: NO)` означает, что приложение пытается подключиться к MySQL с неправильными параметрами.

## Решение

### 1. Создайте файл .env на хостинге

Скопируйте `.env.example` в `.env` и настройте параметры базы данных:

```bash
cp .env.example .env
```

### 2. Настройте параметры базы данных в .env

```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

**Важно:** Замените на реальные данные вашей базы данных на хостинге.

### 3. Сгенерируйте APP_KEY

```bash
php artisan key:generate
```

### 4. Очистите кэш

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### 5. Запустите миграции (если нужно)

```bash
php artisan migrate
```

## Типичные настройки для хостингов

### Для cPanel/WHM:
- DB_HOST: localhost
- DB_DATABASE: имя_базы_данных
- DB_USERNAME: имя_пользователя_базы
- DB_PASSWORD: пароль_пользователя

### Для VPS/выделенных серверов:
- DB_HOST: localhost (или IP адрес MySQL сервера)
- DB_DATABASE: имя_базы_данных
- DB_USERNAME: имя_пользователя_базы
- DB_PASSWORD: пароль_пользователя

## Проверка подключения

После настройки проверьте подключение:

```bash
php artisan tinker
```

В tinker выполните:
```php
DB::connection()->getPdo();
```

Если команда выполнится без ошибок, подключение настроено правильно.

## Дополнительные настройки

### Настройка прав доступа к файлам
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### Настройка веб-сервера
Убедитесь, что веб-сервер настроен на папку `public/` как корневую директорию.

## Если проблема остается

1. Проверьте, что MySQL сервер запущен
2. Убедитесь, что пользователь базы данных имеет права на доступ к базе
3. Проверьте, что база данных существует
4. Убедитесь, что хост правильный (localhost, 127.0.0.1, или IP адрес)
