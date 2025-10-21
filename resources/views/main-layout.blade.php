<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <!-- iOS мета-теги -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="EasyKitchen">
    <meta name="format-detection" content="telephone=no">

    <!-- Иконки -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0095B6">
    <meta name="msapplication-TileColor" content="#0095B6">
    <meta name="theme-color" content="#0095B6">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Стили -->
    <link rel="stylesheet" href="{{ asset('css/ios-styles.css') }}?v=14">

    <!-- PWA манифест -->
    <link rel="manifest" href="/manifest.json">
</head>

<body>
    <div class="app-container">
        <!-- Верхняя навигация -->
        <nav class="ios-navbar safe-area-top">
            <div>
                <h1 class="ios-navbar-title">@yield('navbar-title', 'EasyKitchen')</h1>
            </div>
        </nav>

        <!-- Основной контент -->
        <main class="ios-content">
            @yield('main-content')
        </main>

        <!-- Нижняя навигация -->
        <nav class="ios-bottom-nav safe-area-bottom">
            <a href="{{ route('home') }}" class="ios-bottom-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <svg class="ios-bottom-nav-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
                </svg>
                <span class="ios-bottom-nav-label">Главная</span>
            </a>

            <a href="#" class="ios-bottom-nav-item {{ request()->routeIs('storage') ? 'active' : '' }}" onclick="openStorageModal(); return false;">
                <svg class="ios-bottom-nav-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 3h7v7H3V3zm11 0h7v7h-7V3zM3 14h7v7H3v-7zm11 0h7v7h-7v-7z" />
                </svg>
                <span class="ios-bottom-nav-label">Отделы</span>
            </a>

            <a href="{{ route('add-product') }}" class="ios-bottom-nav-item {{ request()->routeIs('add-product') ? 'active' : '' }}">
                <svg class="ios-bottom-nav-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z" />
                </svg>
                <span class="ios-bottom-nav-label">Добавить</span>
            </a>

            <a href="{{ route('settings') }}" class="ios-bottom-nav-item {{ request()->routeIs('settings') ? 'active' : '' }}">
                <svg class="ios-bottom-nav-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 15.5A3.5 3.5 0 0 1 8.5 12A3.5 3.5 0 0 1 12 8.5a3.5 3.5 0 0 1 3.5 3.5a3.5 3.5 0 0 1-3.5 3.5m7.43-2.53c.04-.32.07-.64.07-.97c0-.33-.03-.66-.07-1l2.11-1.63c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.31-.61-.22l-2.49 1c-.52-.39-1.06-.73-1.69-.98l-.37-2.65A.506.506 0 0 0 14 2h-4c-.25 0-.46.18-.5.42l-.37 2.65c-.63.25-1.17.59-1.69.98l-2.49-1c-.22-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64L4.57 11c-.04.34-.07.67-.07 1c0 .33.03.65.07.97l-2.11 1.66c-.19.15-.25.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1.01c.52.4 1.06.74 1.69.99l.37 2.65c.04.24.25.42.5.42h4c.25 0 .46-.18.5-.42l.37-2.65c.63-.26 1.17-.59 1.69-.99l2.49 1.01c.22.08.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.66Z" />
                </svg>
                <span class="ios-bottom-nav-label">Настройки</span>
            </a>
        </nav>
    </div>

    <!-- Модальное окно выбора отдела -->
    <div id="storageModal" class="ios-modal-overlay">
        <div class="ios-modal">
            <div class="ios-modal-header">
                <h2 class="ios-modal-title">Выберите отдел</h2>
                <button class="ios-modal-close" onclick="closeStorageModal()">×</button>
            </div>
            <div class="ios-modal-content">
                <div class="ios-modal-storage-grid">
                    <a href="{{ route('storage', 3) }}" class="ios-modal-storage-item" onclick="closeStorageModal()">
                        <svg class="ios-modal-storage-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 3h7v7H3V3zm11 0h7v7h-7V3zM3 14h7v7H3v-7zm11 0h7v7h-7v-7z" />
                        </svg>
                        <p class="ios-modal-storage-name">Верхний отдел</p>
                    </a>

                    <a href="{{ route('storage', 1) }}" class="ios-modal-storage-item" onclick="closeStorageModal()">
                        <svg class="ios-modal-storage-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 3h7v7H3V3zm11 0h7v7h-7V3zM3 14h7v7H3v-7zm11 0h7v7h-7v-7z" />
                        </svg>
                        <p class="ios-modal-storage-name">Средний отдел</p>
                    </a>

                    <a href="{{ route('storage', 2) }}" class="ios-modal-storage-item" onclick="closeStorageModal()">
                        <svg class="ios-modal-storage-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 3h7v7H3V3zm11 0h7v7h-7V3zM3 14h7v7H3v-7zm11 0h7v7h-7v-7z" />
                        </svg>
                        <p class="ios-modal-storage-name">Нижний отдел</p>
                    </a>

                    <a href="{{ route('storage', 4) }}" class="ios-modal-storage-item" onclick="closeStorageModal()">
                        <svg class="ios-modal-storage-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 3h7v7H3V3zm11 0h7v7h-7V3zM3 14h7v7H3v-7zm11 0h7v7h-7v-7z" />
                        </svg>
                        <p class="ios-modal-storage-name">Холодильник</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Скрипты -->
    <script>
        // Поддержка PWA
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js');
            });
        }

        // Предотвращение зума при двойном тапе
        let lastTouchEnd = 0;
        document.addEventListener('touchend', function(event) {
            const now = (new Date()).getTime();
            if (now - lastTouchEnd <= 300) {
                event.preventDefault();
            }
            lastTouchEnd = now;
        }, false);

        // Анимация появления элементов
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.ios-card, .ios-product-item, .ios-alert');
            elements.forEach((element, index) => {
                element.style.animationDelay = (index * 0.1) + 's';
                element.classList.add('ios-fade-in');
            });
        });

        // Функции для модального окна выбора отдела
        function openStorageModal() {
            const modal = document.getElementById('storageModal');
            modal.classList.add('show');
            document.body.style.overflow = 'hidden'; // Блокируем прокрутку фона
        }

        function closeStorageModal() {
            const modal = document.getElementById('storageModal');
            modal.classList.remove('show');
            document.body.style.overflow = ''; // Восстанавливаем прокрутку
        }

        // Закрытие модального окна при клике на фон
        document.getElementById('storageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeStorageModal();
            }
        });

        // Закрытие модального окна по клавише Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeStorageModal();
            }
        });

        // Свайп для удаления продуктов
        let startX = 0;
        let currentX = 0;
        let isDragging = false;
        let currentContainer = null;

        document.addEventListener('touchstart', function(e) {
            const container = e.target.closest('.ios-swipe-container');
            if (!container) return;

            startX = e.touches[0].clientX;
            currentX = startX;
            isDragging = true;
            currentContainer = container;
        });

        document.addEventListener('touchmove', function(e) {
            if (!isDragging || !currentContainer) return;

            currentX = e.touches[0].clientX;
            const deltaX = currentX - startX;

            // Ограничиваем свайп только влево
            if (deltaX < 0) {
                const translateX = Math.max(deltaX, -80);
                currentContainer.querySelector('.ios-swipe-content').style.transform = `translateX(${translateX}px)`;
                currentContainer.querySelector('.ios-swipe-actions').style.transform = `translateX(${80 + translateX}px)`;
            }
        });

        document.addEventListener('touchend', function(e) {
            if (!isDragging || !currentContainer) return;

            const deltaX = currentX - startX;

            if (deltaX < -40) {
                // Показать кнопку удаления
                currentContainer.classList.add('swiped');
            } else {
                // Скрыть кнопку удаления
                currentContainer.classList.remove('swiped');
                currentContainer.querySelector('.ios-swipe-content').style.transform = '';
                currentContainer.querySelector('.ios-swipe-actions').style.transform = '';
            }

            isDragging = false;
            currentContainer = null;
        });

        // Функция удаления продукта
        function deleteProduct(productId) {
            if (confirm('Удалить продукт?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/delete-product/deleted/${productId}`;

                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                if (csrfToken) {
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken.getAttribute('content');
                    form.appendChild(csrfInput);
                }

                document.body.appendChild(form);
                form.submit();
            }
        }

        // Функция очистки поиска
        function clearSearch() {
            const searchInput = document.querySelector('.ios-search-input');
            if (searchInput) {
                searchInput.value = '';
                searchInput.form.submit();
            }
        }
    </script>
</body>

</html>