@extends('main-layout')
@section('title')
Склады | EasyKitchen
@endsection

@section('navbar-title')
Склады
@endsection

@section('main-content')
<div class="ios-card">
    <h2 class="ios-card-header ios-text-center">Выберите склад</h2>

    <a href="{{ route('storage', 3) }}" class="ios-button">
        <svg style="width: 20px; height: 20px; margin-right: 8px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
            <path d="M9 9h6v6H9z" />
        </svg>
        Верхний отдел
    </a>

    <a href="{{ route('storage', 1) }}" class="ios-button">
        <svg style="width: 20px; height: 20px; margin-right: 8px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
            <path d="M9 9h6v6H9z" />
        </svg>
        Средний отдел
    </a>

    <a href="{{ route('storage', 2) }}" class="ios-button">
        <svg style="width: 20px; height: 20px; margin-right: 8px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
            <path d="M9 9h6v6H9z" />
        </svg>
        Нижний отдел
    </a>

    <a href="{{ route('storage', 4) }}" class="ios-button">
        <svg style="width: 20px; height: 20px; margin-right: 8px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
            <path d="M9 9h6v6H9z" />
        </svg>
        Холодильник
    </a>
</div>
@endsection