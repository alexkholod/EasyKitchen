@extends('main-layout')
@section('title')
    Storage | Easy Kitchen App
@endsection

@section('main-content')
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0095B6;">
        <div class="navbar-brand">Easy Kitchen App | {{ $storage }}</div>
        <div class="navbar-text">Продукты под контролем :)</div>
    </nav>

    <div class="container">
        @if ($data->isEmpty())
        <div class="row mt-3 mb-3">
            <div class="alert alert-info m-auto">
                Тут пока ничего нет
            </div>
        </div>
        <div class="row m-auto">
            <a class="btn btn-primary m-auto" href="{{ route('add-product') }}">
                Положить что-нибудь
            </a>
        </div>
        @endif

        @foreach($data as $element)
        <div class="col-12 alert alert-info mr-1 mt-3">
            <a href="{{ route('single', $element->id) }}">
            <div class="row align-content-center">
                <div class="col-6"><b>{{ $element->name }}</b></div>
                <div class="col-4">{{ $element->description }}</div>
                <div class="col-2">
                    <form action="{{ route('deleted', $element->id )}}" method="post">
                        @csrf
                        {{ Form::submit('☒', ['class' => 'btn btn-info ml-0']) }}
                    </form>
                </div>
            </div>
            </a>
        </div>
        @endforeach
        <div class="row justify-content-center mt-3 mb-auto">
            <div class="col-12 mb-1">
                <form action="{{ route('storage', 3 )}}" method="get">
                    @csrf
                    {{ Form::submit('Верхний отдел', ['class' => 'btn btn-info col-12 m-auto', 'id' => 3]) }}
                </form>
            </div>
            <div class="col-12 mb-1">
                <form action="{{ route('storage', 1 )}}" method="get">
                    @csrf
                    {{ Form::submit('Средний отдел', ['class' => 'btn btn-info col-12 m-auto', 'id' => 1]) }}
                </form>
            </div>
            <div class="col-12 mb-1">
                <form action="{{ route('storage', 2 )}}" method="get">
                    @csrf
                    {{ Form::submit('Нижний отдел', ['class' => 'btn btn-info col-12 m-auto', 'id' => 2]) }}
                </form>
            </div>
            <div class="col-12 mb-1">
                <form action="{{ route('storage', 4 )}}" method="get">
                    @csrf
                    {{ Form::submit('Холодильник', ['class' => 'btn btn-info col-12 m-auto', 'id' => 4]) }}
                </form>
            </div>
        </div>
    </div>
@endsection
