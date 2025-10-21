<?php

/**
 * Код для добавления в начало public/index.php
 * Это принудительно заставит Laravel использовать HTTPS
 */

// Принудительное HTTPS для всех URL
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    // Если уже HTTPS, принудительно устанавливаем схему
    $_SERVER['REQUEST_SCHEME'] = 'https';
    $_SERVER['SERVER_PORT'] = '443';
}

// Устанавливаем переменные окружения для Laravel
putenv('APP_URL=https://freeze.running-life.ru');
$_ENV['APP_URL'] = 'https://freeze.running-life.ru';

// Остальной код Laravel...
