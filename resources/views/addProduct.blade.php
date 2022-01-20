@extends('main-layout')
@section('title')
    Add Product | Easy Kitchen App
@endsection

@section('main-content')
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0095B6;">
        <div class="navbar-brand">Easy Kitchen App | Ввод продукта</div>
        <div class="navbar-text">Продукты под контролем :)</div>
    </nav>
    <div class="container">
        <br>
        <div class="form-group col-10">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('added') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Что кладём</label>
                    {{ Form::text('name','', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    <label for="storages">Куда</label>
                    {{ Form::select('storages', $storages, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    <label for="description">Сколько</label>
                    {{ Form::text('description','', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    <label for="expired_at">Срок годности (не обязательно)</label>
                    {{ Form::input('date','expired_at','', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
                </div>
            </form>
        </div>
    </div>
@endsection
