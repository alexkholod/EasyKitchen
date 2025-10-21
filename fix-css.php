<?php

/**
 * Скрипт для исправления проблем с CSS на хостинге
 * Загрузите на хостинг и откройте в браузере
 */

echo "<h1>Исправление CSS на хостинге</h1>";

// Проверяем текущее состояние
echo "<h2>Текущее состояние:</h2>";
$css_path = 'public/css/ios-styles.css';
if (file_exists($css_path)) {
    echo "✅ CSS файл существует: $css_path<br>";
    echo "Размер: " . filesize($css_path) . " байт<br>";
} else {
    echo "❌ CSS файл не найден: $css_path<br>";
}

// Создаем CSS файл, если его нет
if (!file_exists($css_path)) {
    echo "<h2>Создание CSS файла...</h2>";

    // Создаем директорию, если не существует
    if (!is_dir('public/css')) {
        mkdir('public/css', 0755, true);
        echo "✅ Создана директория public/css/<br>";
    }

    // Создаем базовый CSS файл
    $css_content = '/* iOS-стиль дизайн для EasyKitchen */

/* CSS переменные для цветовой схемы */
:root {
    --primary-color: #0095B6;
    --primary-dark: #007A96;
    --primary-light: #4DB8D1;
    --secondary-color: #F2F2F7;
    --background-color: #F2F2F7;
    --surface-color: #FFFFFF;
    --text-primary: #000000;
    --text-secondary: #8E8E93;
    --border-color: #C6C6C8;
    --shadow-color: rgba(0, 0, 0, 0.1);
    --danger-color: #FF3B30;
    --success-color: #34C759;
    --warning-color: #FF9500;
    --info-color: #007AFF;
    
    /* iOS специфичные переменные */
    --ios-spacing: 16px;
    --ios-spacing-small: 8px;
    --ios-spacing-large: 24px;
    --ios-radius: 10px;
    --ios-radius-small: 6px;
    --ios-radius-large: 16px;
}

/* Базовые стили */
* {
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    background-color: var(--background-color);
    color: var(--text-primary);
    margin: 0;
    padding: 0;
    line-height: 1.4;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Контейнер приложения */
.ios-app {
    min-height: 100vh;
    background-color: var(--background-color);
    position: relative;
}

/* Контент */
.ios-content {
    padding-bottom: 80px;
    padding-top: var(--ios-spacing);
    padding-left: 8px;
    padding-right: 8px;
}

/* Карточки */
.ios-card {
    background-color: var(--surface-color);
    border-radius: var(--ios-radius);
    margin-bottom: var(--ios-spacing);
    box-shadow: 0 1px 3px var(--shadow-color);
    border: 1px solid var(--border-color);
    overflow: hidden;
}

.ios-card-header {
    font-size: 18px;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
    padding: var(--ios-spacing);
    border-bottom: 1px solid var(--border-color);
    background-color: var(--surface-color);
}

/* Кнопки */
.ios-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 20px;
    background-color: var(--primary-color);
    color: white;
    text-decoration: none;
    border-radius: var(--ios-radius);
    font-size: 16px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 1px 3px var(--shadow-color);
}

.ios-button:hover {
    background-color: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow: 0 2px 6px var(--shadow-color);
}

.ios-button:active {
    transform: translateY(0);
    box-shadow: 0 1px 3px var(--shadow-color);
}

/* Алерты */
.ios-alert {
    padding: var(--ios-spacing);
    border-radius: var(--ios-radius);
    margin-bottom: var(--ios-spacing);
    border: 1px solid;
}

.ios-alert-success {
    background-color: #E8F5E8;
    border-color: var(--success-color);
    color: #2D5A2D;
}

.ios-alert-danger {
    background-color: #FFE8E8;
    border-color: var(--danger-color);
    color: #8B0000;
}

.ios-alert-info {
    background-color: #E8F4FF;
    border-color: var(--info-color);
    color: #003D66;
}

/* Текст */
.ios-text-large { font-size: 24px; }
.ios-text-medium { font-size: 16px; }
.ios-text-small { font-size: 14px; }
.ios-text-caption { font-size: 12px; color: var(--text-secondary); }

.ios-text-center { text-align: center; }
.ios-mb-0 { margin-bottom: 0; }
.ios-mb-1 { margin-bottom: 4px; }
.ios-mb-2 { margin-bottom: 8px; }

/* Навигация */
.ios-top-nav {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background-color: var(--surface-color);
    border-bottom: 1px solid var(--border-color);
    padding: var(--ios-spacing);
    z-index: 1000;
    box-shadow: 0 1px 3px var(--shadow-color);
}

.ios-bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: var(--surface-color);
    border-top: 1px solid var(--border-color);
    padding: var(--ios-spacing-small) 0;
    display: flex;
    justify-content: space-around;
    align-items: center;
    z-index: 1000;
    box-shadow: 0 -2px 8px var(--shadow-color);
    max-width: 100%;
    margin: 0;
}

.ios-bottom-nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
    color: var(--text-secondary);
    transition: color 0.2s ease;
    padding: 4px 8px;
    border-radius: var(--ios-radius-small);
}

.ios-bottom-nav-item.active {
    color: var(--primary-color);
}

.ios-bottom-nav-icon {
    width: 24px;
    height: 24px;
    margin-bottom: 2px;
}

.ios-bottom-nav-label {
    font-size: 10px;
    font-weight: 500;
}

/* Безопасные зоны для устройств с вырезами */
.safe-area-top {
    padding-top: env(safe-area-inset-top);
}

.safe-area-bottom {
    padding-bottom: env(safe-area-inset-bottom);
}

.safe-area-left {
    padding-left: env(safe-area-inset-left);
}

.safe-area-right {
    padding-right: env(safe-area-inset-right);
}

/* Адаптивность */
@media (min-width: 414px) {
    .ios-content {
        /* Убираем ограничения ширины и центрирование */
    }
}

@media (max-width: 375px) {
    .ios-content {
        padding-left: 4px;
        padding-right: 4px;
    }
    
    .ios-card {
        margin-bottom: 12px;
    }
}

/* Список складов - действительно компактный дизайн */
.ios-storage-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 6px;
    margin-bottom: 12px;
}

.ios-storage-item {
    background-color: var(--surface-color);
    border-radius: 6px;
    padding: 8px 6px;
    box-shadow: 0 1px 2px var(--shadow-color);
    border: 1px solid var(--border-color);
    transition: all 0.2s ease;
    cursor: pointer;
    text-decoration: none;
    color: var(--text-primary);
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    min-height: 45px;
    justify-content: center;
}

.ios-storage-item:hover {
    background-color: var(--secondary-color);
    transform: translateY(-1px);
    box-shadow: 0 2px 4px var(--shadow-color);
}

.ios-storage-item:active {
    background-color: var(--border-color);
    transform: translateY(0);
}

.ios-storage-icon {
    width: 18px;
    height: 18px;
    margin-bottom: 2px;
    color: var(--primary-color);
    transition: color 0.2s ease;
}

.ios-storage-name {
    font-size: 11px;
    font-weight: 600;
    line-height: 1.1;
    margin: 0;
}

/* Поиск в стиле iOS */
.ios-search-form {
    margin: 0;
}

.ios-search-container {
    position: relative;
    display: flex;
    align-items: center;
}

.ios-search-icon {
    position: absolute;
    left: 12px;
    width: 20px;
    height: 20px;
    color: var(--text-secondary);
    z-index: 2;
}

.ios-search-input {
    width: 100%;
    padding: 12px 12px 12px 44px;
    border: 1px solid var(--border-color);
    border-radius: 10px;
    font-size: 16px;
    background-color: var(--surface-color);
    color: var(--text-primary);
    transition: all 0.2s ease;
}

.ios-search-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(0, 149, 182, 0.1);
}

.ios-search-input::placeholder {
    color: var(--text-secondary);
}

.ios-search-clear {
    position: absolute;
    right: 12px;
    background: none;
    border: none;
    color: var(--text-secondary);
    cursor: pointer;
    padding: 4px;
    border-radius: 50%;
    transition: background-color 0.2s ease;
    z-index: 2;
}

.ios-search-clear:hover {
    background-color: var(--secondary-color);
}

.ios-search-clear svg {
    width: 16px;
    height: 16px;
}

/* Компактный список продуктов в стиле iOS */
.ios-compact-product-list {
    display: flex;
    flex-direction: column;
    gap: 1px;
    background-color: var(--border-color);
    border-radius: 8px;
    overflow: hidden;
}

.ios-compact-product-item {
    background-color: var(--surface-color);
    padding: 12px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    transition: background-color 0.2s ease;
    border: none;
    text-decoration: none;
    color: var(--text-primary);
}

.ios-compact-product-item:hover {
    background-color: var(--secondary-color);
}

.ios-compact-product-item:active {
    background-color: var(--border-color);
}

.ios-compact-product-info {
    flex: 1;
    min-width: 0;
}

.ios-compact-product-name {
    font-size: 16px;
    font-weight: 500;
    color: var(--text-primary);
    margin: 0 0 2px 0;
    line-height: 1.3;
}

.ios-compact-product-meta {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 8px;
}

.ios-compact-product-description {
    font-size: 14px;
    color: var(--text-secondary);
    margin: 0;
    line-height: 1.2;
    flex: 1;
    min-width: 0;
}

.ios-compact-product-date {
    font-size: 12px;
    color: var(--text-secondary);
    line-height: 1.2;
    white-space: nowrap;
    flex-shrink: 0;
}

.ios-compact-product-arrow {
    width: 20px;
    height: 20px;
    color: var(--text-secondary);
    margin-left: 12px;
    flex-shrink: 0;
}

.ios-compact-product-arrow svg {
    width: 100%;
    height: 100%;
}

/* Свайп для удаления в стиле iOS */
.ios-swipe-container {
    position: relative;
    overflow: hidden;
    background-color: var(--surface-color);
}

.ios-swipe-content {
    position: relative;
    z-index: 2;
    background-color: var(--surface-color);
    transition: transform 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
    cursor: pointer;
}

.ios-swipe-actions {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 80px;
    background-color: #ff3b30; /* iOS red */
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateX(100%);
    transition: transform 0.3s ease;
    z-index: 1;
}

.ios-swipe-delete {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    padding: 8px;
    border-radius: 50%;
    transition: background-color 0.2s ease;
}

.ios-swipe-delete:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

.ios-swipe-delete svg {
    width: 20px;
    height: 20px;
}

.ios-swipe-container.swiped .ios-swipe-content {
    transform: translateX(-80px);
}

.ios-swipe-container.swiped .ios-swipe-actions {
    transform: translateX(0);
}

/* Модальное окно в стиле iOS */
.ios-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 2000;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.ios-modal-overlay.show {
    opacity: 1;
    visibility: visible;
}

.ios-modal {
    background-color: var(--surface-color);
    border-radius: 16px 16px 0 0;
    width: 100%;
    max-width: 500px;
    max-height: 80vh;
    transform: translateY(100%);
    transition: transform 0.3s ease;
    box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.15);
}

.ios-modal-overlay.show .ios-modal {
    transform: translateY(0);
}

.ios-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: var(--ios-spacing);
    border-bottom: 1px solid var(--border-color);
}

.ios-modal-title {
    font-size: 18px;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
}

.ios-modal-close {
    background: none;
    border: none;
    font-size: 24px;
    color: var(--text-secondary);
    cursor: pointer;
    padding: 4px;
    border-radius: 50%;
    transition: background-color 0.2s ease;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.ios-modal-close:hover {
    background-color: var(--secondary-color);
}

.ios-modal-content {
    padding: var(--ios-spacing);
    max-height: 60vh;
    overflow-y: auto;
}

.ios-modal-storage-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.ios-modal-storage-item {
    background-color: var(--surface-color);
    border: 1px solid var(--border-color);
    border-radius: var(--ios-radius);
    padding: 16px 12px;
    text-decoration: none;
    color: var(--text-primary);
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    transition: all 0.2s ease;
    box-shadow: 0 1px 3px var(--shadow-color);
}

.ios-modal-storage-item:hover {
    background-color: var(--secondary-color);
    transform: translateY(-1px);
    box-shadow: 0 2px 6px var(--shadow-color);
}

.ios-modal-storage-icon {
    width: 24px;
    height: 24px;
    margin-bottom: 8px;
    color: var(--primary-color);
}

.ios-modal-storage-name {
    font-size: 14px;
    font-weight: 500;
    margin: 0;
    line-height: 1.2;
}

/* Формы */
.ios-form-group {
    margin-bottom: var(--ios-spacing);
}

.ios-label {
    display: block;
    font-size: 14px;
    font-weight: 500;
    color: var(--text-primary);
    margin-bottom: 6px;
}

.ios-input, .ios-select {
    width: 100%;
    padding: 12px;
    border: 1px solid var(--border-color);
    border-radius: var(--ios-radius);
    font-size: 16px;
    background-color: var(--surface-color);
    color: var(--text-primary);
    transition: all 0.2s ease;
}

.ios-input:focus, .ios-select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(0, 149, 182, 0.1);
}

.ios-input::placeholder {
    color: var(--text-secondary);
}

/* Список продуктов */
.ios-product-list {
    display: flex;
    flex-direction: column;
    gap: 1px;
    background-color: var(--border-color);
    border-radius: 8px;
    overflow: hidden;
}

.ios-product-item {
    background-color: var(--surface-color);
    padding: 12px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    transition: background-color 0.2s ease;
    border: none;
    text-decoration: none;
    color: var(--text-primary);
}

.ios-product-item:hover {
    background-color: var(--secondary-color);
}

.ios-product-item:active {
    background-color: var(--border-color);
}

.ios-product-name {
    font-size: 16px;
    font-weight: 500;
    color: var(--text-primary);
    margin: 0;
}

.ios-product-arrow {
    width: 20px;
    height: 20px;
    color: var(--text-secondary);
    margin-left: 12px;
    flex-shrink: 0;
}

.ios-product-arrow svg {
    width: 100%;
    height: 100%;
}';

    if (file_put_contents($css_path, $css_content)) {
        echo "✅ CSS файл создан успешно<br>";
    } else {
        echo "❌ Ошибка создания CSS файла<br>";
    }
} else {
    echo "✅ CSS файл уже существует<br>";
}

// Проверяем доступность через веб
echo "<h2>Проверка доступности:</h2>";
$css_url = 'https://freeze.running-life.ru/css/ios-styles.css';
echo "CSS URL: <a href='$css_url' target='_blank'>$css_url</a><br>";

// Проверяем права доступа
if (file_exists($css_path)) {
    $perms = substr(sprintf('%o', fileperms($css_path)), -4);
    echo "Права доступа: $perms<br>";

    if ($perms >= '0644') {
        echo "✅ Права доступа корректные<br>";
    } else {
        echo "❌ Права доступа слишком ограниченные<br>";
        chmod($css_path, 0644);
        echo "✅ Права доступа исправлены<br>";
    }
}

echo "<br><h2>Следующие шаги:</h2>";
echo "1. Проверьте, что CSS файл доступен по ссылке выше<br>";
echo "2. Очистите кэш браузера (Ctrl+F5)<br>";
echo "3. Проверьте консоль браузера на ошибки<br>";
echo "4. Убедитесь, что веб-сервер настроен на папку public/<br>";
