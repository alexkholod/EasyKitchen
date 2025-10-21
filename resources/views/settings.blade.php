@extends('main-layout')
@section('title')
Настройки | EasyKitchen
@endsection

@section('navbar-title')
Настройки
@endsection

@section('main-content')
<div class="ios-card">
    <h2 class="ios-card-header">Информация о приложении</h2>

    <div class="ios-alert ios-alert-info">
        <div class="ios-text-medium ios-mb-1">📱 EasyKitchen</div>
        <div class="ios-text-small ios-mb-1">Версия: 1.0.0</div>
        <div class="ios-text-small ios-mb-0">Продукты под контролем :)</div>
    </div>
</div>

<div class="ios-card">
    <h2 class="ios-card-header">Статистика</h2>

    <div class="ios-storage-grid">
        <div class="ios-storage-item" style="cursor: default;">
            <svg class="ios-storage-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                <path d="M9 9h6v6H9z" />
            </svg>
            <p class="ios-storage-name">Всего отделов</p>
            <div class="ios-text-caption">4</div>
        </div>

        <div class="ios-storage-item" style="cursor: default;">
            <svg class="ios-storage-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" />
                <path d="M8 12l2 2 4-4" />
            </svg>
            <p class="ios-storage-name">Продуктов</p>
            <div class="ios-text-caption">{{ $totalProducts ?? '0' }}</div>
        </div>
    </div>
</div>

@endsection