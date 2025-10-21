@extends('main-layout')
@section('title')
Редактировать {{ $product->name }} | EasyKitchen
@endsection

@section('navbar-title')
Редактировать продукт
@endsection

@section('main-content')
<div class="ios-card">
    @if($errors->any())
    <div class="ios-alert ios-alert-danger">
        <div class="ios-text-medium ios-mb-1">Ошибки в форме:</div>
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
            <li class="ios-text-small">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('update-product', $product->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="ios-form-group">
            <label for="name" class="ios-label">Название продукта</label>
            <input type="text" id="name" name="name" class="ios-input" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="ios-form-group">
            <label for="storages" class="ios-label">Отдел</label>
            <select id="storages" name="storages" class="ios-select" required>
                <option value="">Выберите отдел</option>
                @foreach($storages as $id => $name)
                <option value="{{ $id }}" {{ old('storages', $product->storage_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="ios-form-group">
            <label for="description" class="ios-label">Описание/количество</label>
            <input type="text" id="description" name="description" class="ios-input" value="{{ old('description', $product->description) }}">
        </div>

        <div class="ios-form-group">
            <label for="expired_at" class="ios-label">Срок годности</label>
            <input type="date" id="expired_at" name="expired_at" class="ios-input" value="{{ old('expired_at', $product->expired_at ? \Carbon\Carbon::parse($product->expired_at)->format('Y-m-d') : '') }}">
        </div>

        <div class="ios-form-group">
            <button type="submit" class="ios-button">
                <svg style="width: 20px; height: 20px; margin-right: 8px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                    <polyline points="17,21 17,13 7,13 7,21" />
                    <polyline points="7,3 7,8 15,8" />
                </svg>
                Сохранить
            </button>
        </div>
    </form>
</div>

<!-- Кнопка удаления -->
<div class="ios-card">
    <form action="{{ route('deleted', $product->id) }}" method="post" style="margin: 0;">
        @csrf
        <button type="submit" class="ios-button" style="background-color: #ff3b30;" onclick="return confirm('Удалить продукт?')">
            <svg style="width: 20px; height: 20px; margin-right: 8px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="3,6 5,6 21,6" />
                <path d="M19,6v14a2,2 0 0,1 -2,2H7a2,2 0 0,1 -2,-2V6m3,0V4a2,2 0 0,1 2,-2h4a2,2 0 0,1 2,2v2" />
                <line x1="10" y1="11" x2="10" y2="17" />
                <line x1="14" y1="11" x2="14" y2="17" />
            </svg>
            Удалить
        </button>
    </form>
</div>
@endsection