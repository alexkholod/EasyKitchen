<?php

/**
 * Скрипт для отладки путей к ресурсам
 * Загрузите на хостинг и откройте в браузере
 */

echo "<h1>Отладка путей к ресурсам</h1>";

// Проверка базовых настроек
echo "<h2>Настройки приложения:</h2>";
echo "APP_URL: " . (getenv('APP_URL') ?: 'не установлен') . "<br>";
echo "APP_ENV: " . (getenv('APP_ENV') ?: 'не установлен') . "<br>";

// Проверка файловой системы
echo "<h2>Файловая система:</h2>";
$css_path = 'public/css/ios-styles.css';
if (file_exists($css_path)) {
    echo "✅ CSS файл существует: $css_path<br>";
    echo "Размер файла: " . filesize($css_path) . " байт<br>";
    echo "Права доступа: " . substr(sprintf('%o', fileperms($css_path)), -4) . "<br>";
} else {
    echo "❌ CSS файл не найден: $css_path<br>";
}

// Проверка через веб
echo "<h2>Доступность через веб:</h2>";
$css_url = 'https://freeze.running-life.ru/css/ios-styles.css';
echo "CSS URL: <a href='$css_url' target='_blank'>$css_url</a><br>";

// Проверка содержимого CSS
echo "<h2>Содержимое CSS (первые 200 символов):</h2>";
if (file_exists($css_path)) {
    $css_content = file_get_contents($css_path);
    echo "<pre>" . htmlspecialchars(substr($css_content, 0, 200)) . "...</pre>";
} else {
    echo "❌ Не удалось прочитать CSS файл<br>";
}

// Проверка Laravel asset()
echo "<h2>Laravel asset() функция:</h2>";
if (file_exists('vendor/autoload.php')) {
    require_once 'vendor/autoload.php';

    // Инициализация Laravel
    $app = require_once 'bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

    echo "asset('css/ios-styles.css'): " . asset('css/ios-styles.css') . "<br>";
    echo "url('css/ios-styles.css'): " . url('css/ios-styles.css') . "<br>";
} else {
    echo "❌ Laravel не найден<br>";
}

// Проверка заголовков
echo "<h2>Заголовки запроса:</h2>";
echo "HTTP_HOST: " . ($_SERVER['HTTP_HOST'] ?? 'не установлен') . "<br>";
echo "REQUEST_SCHEME: " . ($_SERVER['REQUEST_SCHEME'] ?? 'не установлен') . "<br>";
echo "SERVER_PORT: " . ($_SERVER['SERVER_PORT'] ?? 'не установлен') . "<br>";

// Проверка mixed content
echo "<h2>Проверка Mixed Content:</h2>";
echo "<script>
console.log('Проверка загрузки CSS...');
fetch('css/ios-styles.css')
    .then(response => {
        console.log('Статус ответа:', response.status);
        if (response.ok) {
            console.log('✅ CSS файл загружен успешно');
            return response.text();
        } else {
            console.log('❌ Ошибка загрузки CSS:', response.status);
        }
    })
    .then(text => {
        if (text) {
            console.log('Размер CSS:', text.length, 'символов');
            console.log('Первые 100 символов:', text.substring(0, 100));
        }
    })
    .catch(error => {
        console.log('❌ Ошибка:', error);
    });
</script>";

echo "<br><h2>Рекомендации:</h2>";
echo "1. Проверьте, что CSS файл находится в public/css/<br>";
echo "2. Убедитесь, что права доступа к файлу правильные (644)<br>";
echo "3. Проверьте, что веб-сервер настроен на папку public/<br>";
echo "4. Убедитесь, что нет ошибок в консоли браузера<br>";
