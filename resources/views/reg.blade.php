@extends('layout.app')
@section('title')
Регистрация
@endsection
@section('content')
<div class="container" style="height:700px">
    <div class="row mt-5">
        <div class="col-7">
            <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
                <h3>Регистрация</h3>
                <form action="{{ route('regSave') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="mb-3">
                    <input type="text" placeholder="ФИО" name="fio" class="form-control @error('fio') is-invalid @enderror">
                    <div class="invalid-feedback">
                        @error('fio')
                        {{$message}}
                        @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <input type="tel" placeholder="Телефон" name="phone" class="form-control @error('phone') is-invalid @enderror" >
                    <div class="invalid-feedback">
                        @error('phone')
                        {{$message}}
                        @enderror
                    </div>
                </div>

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

                <div class="mb-3">
                    <input type="password" placeholder="Повторите пароль" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" >
                    <div class="invalid-feedback">
                        @error('password_confirmation')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <input type="checkbox" id="rule" name="rule" class="form-check-input @error('rule') is-invalid @enderror" >
                    <label for="rule">Согласие на обработку ПД</label>
                    <div class="invalid-feedback">
                        @error('rule')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn" style="background-color:#2C58AD; border-radius:5px; color:white;">Зарегистрироваться</button>
                </form>
            </div>

        </div>


    </div>
</div>
@endsection
