<?php

/**
 * Скрипт для проверки HTTPS настроек
 * Загрузите на хостинг и откройте в браузере
 */

echo "<h1>Проверка HTTPS настроек</h1>";

// Проверка протокола
echo "<h2>Протокол:</h2>";
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    echo "✅ HTTPS активен<br>";
} else {
    echo "❌ HTTPS не активен<br>";
}

// Проверка заголовков
echo "<h2>Заголовки:</h2>";
echo "HTTP_HOST: " . ($_SERVER['HTTP_HOST'] ?? 'не установлен') . "<br>";
echo "SERVER_PORT: " . ($_SERVER['SERVER_PORT'] ?? 'не установлен') . "<br>";
echo "REQUEST_SCHEME: " . ($_SERVER['REQUEST_SCHEME'] ?? 'не установлен') . "<br>";

// Проверка Laravel настроек
echo "<h2>Laravel настройки:</h2>";
if (file_exists('.env')) {
    $env_content = file_get_contents('.env');
    if (preg_match('/APP_URL=(.+)/', $env_content, $matches)) {
        echo "APP_URL: " . trim($matches[1]) . "<br>";
        if (strpos($matches[1], 'https://') === 0) {
            echo "✅ APP_URL использует HTTPS<br>";
        } else {
            echo "❌ APP_URL не использует HTTPS<br>";
        }
    } else {
        echo "❌ APP_URL не найден в .env<br>";
    }
} else {
    echo "❌ Файл .env не найден<br>";
}

// Проверка CSS файла
echo "<h2>CSS файл:</h2>";
$css_path = 'css/ios-styles.css';
if (file_exists("public/$css_path")) {
    echo "✅ CSS файл существует<br>";
    $css_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . $css_path;
    echo "CSS URL: <a href='$css_url' target='_blank'>$css_url</a><br>";
} else {
    echo "❌ CSS файл не найден<br>";
}

// Проверка mixed content
echo "<h2>Проверка Mixed Content:</h2>";
echo "<script>
if (window.location.protocol === 'https:') {
    console.log('✅ Страница загружена по HTTPS');
    
    // Проверяем CSS
    fetch('css/ios-styles.css')
        .then(response => {
            if (response.ok) {
                console.log('✅ CSS файл доступен');
            } else {
                console.log('❌ CSS файл недоступен');
            }
        })
        .catch(error => {
            console.log('❌ Ошибка загрузки CSS:', error);
        });
} else {
    console.log('❌ Страница загружена по HTTP');
}
</script>";

echo "<br><h2>Рекомендации:</h2>";
echo "1. Убедитесь, что APP_URL в .env начинается с https://<br>";
echo "2. Очистите кэш Laravel: php artisan config:clear<br>";
echo "3. Проверьте настройки веб-сервера для принудительного HTTPS<br>";
echo "4. Убедитесь, что SSL сертификат установлен правильно<br>";
