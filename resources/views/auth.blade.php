@extends('layout.app')
@section('title')
Авторизация
@endsection
@section('content')
<div class="container" style="height:700px">
    <div class="row mt-5">
        <div class="col-7">
            <div class="shadow p-3 mb-5 bg-body-tertiary rounded">

                    @if (session()->has('err'))
                    <div class="alert alert-danger">
                    {{ session('err') }}
                    </div>
                    @endif

                <h3>Авторизация</h3>
                <form action="{{ route('auth') }}" method="post">
                    @method('post')
                    @csrf

                <div class="mb-3">
                    <input type="text" placeholder="Логин" name="login" class="form-control @error('login') is-invalid @enderror" >
                    <div class="invalid-feedback">
                        @error('login')
                        {{$message}}
                        @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <input type="password" placeholder="Пароль" name="password" class="form-control @error('password') is-invalid @enderror" >
                    <div class="invalid-feedback">
                        @error('password')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn" style="background-color:#2C58AD; border-radius:5px; color:white;">Войти</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
