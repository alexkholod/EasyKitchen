<?php

/**
 * Скрипт для диагностики проблем с базой данных на хостинге
 * Запустите этот файл через браузер для проверки настроек
 */

echo "<h1>Диагностика EasyKitchen</h1>";

// Проверка PHP версии
echo "<h2>PHP версия:</h2>";
echo phpversion() . "<br><br>";

// Проверка расширений
echo "<h2>Расширения PHP:</h2>";
$required_extensions = ['pdo', 'pdo_mysql', 'mbstring', 'openssl', 'tokenizer', 'xml', 'ctype', 'json', 'bcmath'];
foreach ($required_extensions as $ext) {
    $status = extension_loaded($ext) ? '✅' : '❌';
    echo "$status $ext<br>";
}
echo "<br>";

// Проверка файла .env
echo "<h2>Файл .env:</h2>";
if (file_exists('.env')) {
    echo "✅ Файл .env существует<br>";
    $env_content = file_get_contents('.env');
    if (strpos($env_content, 'DB_HOST') !== false) {
        echo "✅ Настройки базы данных найдены<br>";
    } else {
        echo "❌ Настройки базы данных не найдены<br>";
    }
} else {
    echo "❌ Файл .env не найден<br>";
}
echo "<br>";

// Проверка подключения к базе данных
echo "<h2>Подключение к базе данных:</h2>";
try {
    // Загружаем настройки из .env
    if (file_exists('.env')) {
        $lines = file('.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $env = [];
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
                list($key, $value) = explode('=', $line, 2);
                $env[trim($key)] = trim($value);
            }
        }

        $host = $env['DB_HOST'] ?? '127.0.0.1';
        $port = $env['DB_PORT'] ?? '3306';
        $database = $env['DB_DATABASE'] ?? '';
        $username = $env['DB_USERNAME'] ?? '';
        $password = $env['DB_PASSWORD'] ?? '';

        echo "Host: $host<br>";
        echo "Port: $port<br>";
        echo "Database: $database<br>";
        echo "Username: $username<br>";
        echo "Password: " . (empty($password) ? 'НЕ УСТАНОВЛЕН' : 'УСТАНОВЛЕН') . "<br><br>";

        // Попытка подключения
        $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";
        $pdo = new PDO($dsn, $username, $password);
        echo "✅ Подключение к базе данных успешно!<br>";

        // Проверка таблиц
        $stmt = $pdo->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        echo "✅ Найдено таблиц: " . count($tables) . "<br>";
        echo "Таблицы: " . implode(', ', $tables) . "<br>";
    } else {
        echo "❌ Файл .env не найден<br>";
    }
} catch (Exception $e) {
    echo "❌ Ошибка подключения: " . $e->getMessage() . "<br>";
}

echo "<br>";

// Проверка прав доступа
echo "<h2>Права доступа:</h2>";
$directories = ['storage', 'bootstrap/cache'];
foreach ($directories as $dir) {
    if (is_dir($dir)) {
        $perms = substr(sprintf('%o', fileperms($dir)), -4);
        echo "✅ $dir: $perms<br>";
    } else {
        echo "❌ $dir: не найден<br>";
    }
}

echo "<br><h2>Рекомендации:</h2>";
echo "1. Убедитесь, что файл .env создан и содержит правильные настройки базы данных<br>";
echo "2. Проверьте, что пользователь базы данных имеет права на доступ к базе<br>";
echo "3. Убедитесь, что база данных существует<br>";
echo "4. Проверьте, что MySQL сервер запущен<br>";
