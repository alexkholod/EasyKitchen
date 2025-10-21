@extends('main-layout')
@section('title')
{{ $storage }} | EasyKitchen
@endsection

@section('navbar-title')
{{ $storage }}
@endsection

@section('main-content')
@if ($data->isEmpty())
<div class="ios-card">
    <div class="ios-text-center">
        <div class="ios-text-large ios-mb-2">📦</div>
        <p class="ios-text-medium ios-mb-2">Тут пока ничего нет</p>
        <a href="{{ route('add-product') }}" class="ios-button">
            <svg style="width: 20px; height: 20px; margin-right: 8px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="16" />
                <line x1="8" y1="12" x2="16" y2="12" />
            </svg>
            Положить что-нибудь
        </a>
    </div>
</div>
@else
<!-- Список продуктов -->
<div class="ios-card">
    <h2 class="ios-card-header">Продукты в {{ $storage }}</h2>
    <div class="ios-compact-product-list">
        @foreach($data as $element)
        <div class="ios-swipe-container" data-product-id="{{ $element->id }}">
            <div class="ios-swipe-content" onclick="window.location.href='{{ route('single', $element->id) }}'">
                <div class="ios-compact-product-info">
                    <div class="ios-compact-product-name">{{ $element->name }}</div>
                    <div class="ios-compact-product-meta">
                        @if($element->description)
                        <div class="ios-compact-product-description">{{ $element->description }}</div>
                        @endif
                        <div class="ios-compact-product-date">{{ \Carbon\Carbon::parse($element->created_at)->format('d.m.Y') }}</div>
                    </div>
                </div>
                <div class="ios-compact-product-arrow">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                </div>
            </div>
            <div class="ios-swipe-actions">
                <button class="ios-swipe-delete" onclick="deleteProduct({{ $element->id }})">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3,6 5,6 21,6" />
                        <path d="M19,6v14a2,2 0 0,1 -2,2H7a2,2 0 0,1 -2,-2V6m3,0V4a2,2 0 0,1 2,-2h4a2,2 0 0,1 2,2v2" />
                        <line x1="10" y1="11" x2="10" y2="17" />
                        <line x1="14" y1="11" x2="14" y2="17" />
                    </svg>
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection