@extends('main-layout')
@section('title')
EasyKitchen - Главная
@endsection

@section('navbar-title')
EasyKitchen
@endsection

@section('main-content')
<!-- Список складов -->
<div class="ios-card">
    <div class="ios-storage-grid">
        <a href="{{ route('storage', 3) }}" class="ios-storage-item">
            <svg class="ios-storage-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                <path d="M9 9h6v6H9z" />
            </svg>
            <p class="ios-storage-name">Верхний отдел</p>
        </a>

        <a href="{{ route('storage', 1) }}" class="ios-storage-item">
            <svg class="ios-storage-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                <path d="M9 9h6v6H9z" />
            </svg>
            <p class="ios-storage-name">Средний отдел</p>
        </a>

        <a href="{{ route('storage', 2) }}" class="ios-storage-item">
            <svg class="ios-storage-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                <path d="M9 9h6v6H9z" />
            </svg>
            <p class="ios-storage-name">Нижний отдел</p>
        </a>

        <a href="{{ route('storage', 4) }}" class="ios-storage-item">
            <svg class="ios-storage-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                <path d="M9 9h6v6H9z" />
            </svg>
            <p class="ios-storage-name">Холодильник</p>
        </a>
    </div>
</div>

<!-- Поиск -->
<div class="ios-card">
    <form action="{{ route('search') }}" method="get" class="ios-search-form">
        <div class="ios-search-container">
            <svg class="ios-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8" />
                <path d="M21 21l-4.35-4.35" />
            </svg>
            <input type="text" name="q" class="ios-search-input" placeholder="Поиск по продуктам..." value="{{ request('q') }}">
            @if(request('q'))
            <button type="button" class="ios-search-clear" onclick="clearSearch()">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
            @endif
        </div>
    </form>
</div>

<!-- Результаты поиска -->
@if(isset($searchResults) && $searchResults->isNotEmpty())
<div class="ios-card">
    <h2 class="ios-card-header">Результаты поиска ({{ $searchResults->count() }})</h2>
    <div class="ios-compact-product-list">
        @foreach($searchResults as $product)
        <div class="ios-swipe-container" data-product-id="{{ $product->id }}">
            <div class="ios-swipe-content" onclick="window.location.href='{{ route('single', $product->id) }}'">
                <div class="ios-compact-product-info">
                    <div class="ios-compact-product-name">{{ $product->name }}</div>
                    @if($product->description)
                    <div class="ios-compact-product-description">{{ $product->description }}</div>
                    @endif
                    <div class="ios-text-caption">{{ $product->storage->name }}</div>
                </div>
                <div class="ios-compact-product-arrow">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@elseif(isset($searchQuery) && $searchQuery)
<div class="ios-alert ios-alert-info">
    <div class="ios-text-medium ios-text-center ios-mb-1">🔍</div>
    <p class="ios-text-medium ios-text-center ios-mb-0">Ничего не найдено</p>
    <p class="ios-text-small ios-text-center ios-mb-0">Попробуйте другой запрос</p>
</div>
@endif

<!-- Уведомления о просрочке -->
@if (!isset($searchQuery) || !$searchQuery)
@if ($expiredProducts->isEmpty())
<div class="ios-alert ios-alert-success">
    <div class="ios-text-large ios-text-center ios-mb-1">✅</div>
    <p class="ios-text-medium ios-text-center ios-mb-0">Просрочки нет</p>
    <p class="ios-text-small ios-text-center ios-mb-0">Всё свеженькое. Так держать!</p>
</div>
@else
<div class="ios-alert ios-alert-danger">
    <div class="ios-text-large ios-text-center ios-mb-1">⚠️</div>
    <p class="ios-text-medium ios-text-center ios-mb-2">Просрочка</p>
    @foreach($expiredProducts as $element)
    <div class="ios-product-item" onclick="window.location.href='{{ route('single', $element->id) }}'">
        <div class="ios-product-name">{{ $element->name }}</div>
        <div class="ios-text-caption">Нажмите для просмотра</div>
    </div>
    @endforeach
</div>
@endif
@endif
@endsection