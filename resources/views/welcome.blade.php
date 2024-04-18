@extends('layout.app')
@section('title')
Главная
@endsection
@section('content')
<div class="container" style="margin-top:50px; height:1700px">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between ">
                <div>
                    <div style="width:40vw; height:52vh" class="shadow p-3 mb-5 bg-body-tertiary rounded">
                        <p  style="width:400px"><h2  style="margin-top:60px; margin-left:50px">Медицинский центр "PROmed"</h2> <br> <p class="p-4" style="font-size: 18px; text-align:justify">     Это профессиональная команда врачей, оснащенная современным оборудованием, готовая предоставить широкий спектр медицинских услуг для заботы о вашем здоровье.</p></p>

                    </div>
                </div>
                <img class="shadow-lg  rounded" src="{{ asset('public\sa2-11.jpg') }}"  style="width: 45vw; height:52vh" alt="">
            </div>

            <div class="mt-5" style="margin-left:440px ;">
                 <h2 style=" margin-left:42px; padding-top:14px" >Наши преимущества</h2>
            </div>


            <div style="margin-top:80px" class="d-flex justify-content-between w-100">
                <div>
                     <img class="shadow-lg  rounded" src="{{ asset('public\0-2.jpg') }}" style="width: 25vw" alt="">
                <h5 class="mt-4 w-75" >Высококвалифицированные специалисты</h5>
                </div>
                <div>
                    <img class="shadow-lg  rounded" src="{{ asset('public\2.jpg') }}" style="width: 26vw" alt="">
                <h5 class="mt-4 w-75" >Широкий спектр медицинских услуг</h5>
                </div>
                <div>
                    <img class="shadow-lg  rounded" src="{{ asset('public\3.jpg') }}" style="width: 26.5vw" alt="">
                <h5 class="mt-4 w-75" >Индивидуальный подход к каждому пациенту</h5>
                </div>

            </div>

            <div  style="margin-left:480px ;margin-top:100px;">
                <h2 >Наши специалисты</h2>
           </div>
            <div class="d-flex justify-content-between" style="margin-top:60px">
                @if(isset($doctors))
                @foreach ($doctors as $doctor)
                    <div>
                    <img class="shadow  rounded" src="{{ asset($doctor->img) }}"style="width: 19vw" alt="">
                    <h5 class="mt-3">{{ $doctor->fio }}</h5>
                    <p>{{ $doctor->special }}</p>
                    </div>
                @endforeach
                @endif

            </div>

            <a href="{{ route('doctorsPage') }}" class="btn mt-5" style="background-color: #2C58AD; color:white; margin-left:550px">Все специалисты</a>
        </div>
    </div>
</div>

@endsection
