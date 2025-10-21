<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Вход | EasyKitchen</title>
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

    <!-- Стили -->
    <link rel="stylesheet" href="{{ asset('css/ios-styles.css') }}">

    <!-- PWA манифест -->
    <link rel="manifest" href="/manifest.json">
</head>

<body>
    <div class="app-container">
        <!-- Верхняя навигация -->
        <nav class="ios-navbar safe-area-top">
            <div>
                <h1 class="ios-navbar-title">EasyKitchen</h1>
                <p class="ios-navbar-subtitle">Вход в систему</p>
            </div>
        </nav>

        <!-- Основной контент -->
        <main class="ios-content safe-area-left safe-area-right">
            <div class="ios-card">
                <h2 class="ios-card-header ios-text-center">Вход</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="ios-form-group">
                        <label for="email" class="ios-label">Email</label>
                        <input id="email" type="email" class="ios-input @error('email') ios-input-error @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Введите ваш email">
                        @error('email')
                        <div class="ios-text-caption" style="color: var(--danger-color); margin-top: 4px;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="ios-form-group">
                        <label for="password" class="ios-label">Пароль</label>
                        <input id="password" type="password" class="ios-input @error('password') ios-input-error @enderror"
                            name="password" required autocomplete="current-password"
                            placeholder="Введите пароль">
                        @error('password')
                        <div class="ios-text-caption" style="color: var(--danger-color); margin-top: 4px;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="ios-form-group">
                        <label class="ios-label" style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}
                                style="margin-right: 8px; transform: scale(1.2);">
                            Запомнить меня
                        </label>
                    </div>

                    <div class="ios-form-group">
                        <button type="submit" class="ios-button">
                            <svg style="width: 20px; height: 20px; margin-right: 8px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                                <polyline points="10,17 15,12 10,7" />
                                <line x1="15" y1="12" x2="3" y2="12" />
                            </svg>
                            Войти
                        </button>
                    </div>
                </form>

                @if (Route::has('password.request'))
                <div class="ios-text-center">
                    <a href="{{ route('password.request') }}" class="ios-text-caption" style="color: var(--primary-color); text-decoration: none;">
                        Забыли пароль?
                    </a>
                </div>
                @endif

                @if (Route::has('register'))
                <div class="ios-text-center ios-mt-2">
                    <a href="{{ route('register') }}" class="ios-button ios-button-secondary">
                        <svg style="width: 20px; height: 20px; margin-right: 8px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="8.5" cy="7" r="4" />
                            <line x1="20" y1="8" x2="20" y2="14" />
                            <line x1="23" y1="11" x2="17" y2="11" />
                        </svg>
                        Регистрация
                    </a>
                </div>
                @endif
            </div>
        </main>
    </div>

    <style>
        .ios-input-error {
            border-color: var(--danger-color) !important;
            box-shadow: 0 0 0 3px rgba(255, 59, 48, 0.1) !important;
        }
    </style>
</body>

</html>