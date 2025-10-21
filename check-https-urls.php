<?php

/**
 * Скрипт для проверки генерации HTTPS URL
 * Загрузите на хостинг и откройте в браузере
 */

echo "<h1>Проверка генерации HTTPS URL</h1>";

// Проверка базовых настроек
echo "<h2>Настройки окружения:</h2>";
echo "APP_URL: " . (getenv('APP_URL') ?: 'не установлен') . "<br>";
echo "APP_ENV: " . (getenv('APP_ENV') ?: 'не установлен') . "<br>";

// Проверка Laravel
if (file_exists('vendor/autoload.php')) {
    require_once 'vendor/autoload.php';

    // Инициализация Laravel
    $app = require_once 'bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

    echo "<h2>Laravel URL генерация:</h2>";
    echo "asset('css/ios-styles.css'): " . asset('css/ios-styles.css') . "<br>";
    echo "url('css/ios-styles.css'): " . url('css/ios-styles.css') . "<br>";
    echo "config('app.url'): " . config('app.url') . "<br>";

    // Принудительное HTTPS
    \URL::forceScheme('https');
    echo "<br>После forceScheme('https'):<br>";
    echo "asset('css/ios-styles.css'): " . asset('css/ios-styles.css') . "<br>";
    echo "url('css/ios-styles.css'): " . url('css/ios-styles.css') . "<br>";
} else {
    echo "❌ Laravel не найден<br>";
}

// Проверка серверных переменных
echo "<h2>Серверные переменные:</h2>";
echo "HTTPS: " . ($_SERVER['HTTPS'] ?? 'не установлен') . "<br>";
echo "SERVER_PORT: " . ($_SERVER['SERVER_PORT'] ?? 'не установлен') . "<br>";
echo "REQUEST_SCHEME: " . ($_SERVER['REQUEST_SCHEME'] ?? 'не установлен') . "<br>";
echo "HTTP_HOST: " . ($_SERVER['HTTP_HOST'] ?? 'не установлен') . "<br>";

echo "<br><h2>Рекомендации:</h2>";
echo "1. Убедитесь, что APP_URL в .env начинается с https://<br>";
echo "2. Очистите кэш Laravel: php artisan config:clear<br>";
echo "3. Проверьте, что веб-сервер настроен на HTTPS<br>";
echo "4. Убедитесь, что SSL сертификат установлен правильно<br>";
