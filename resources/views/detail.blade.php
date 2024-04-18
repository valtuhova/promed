@extends('layout.app')
@section('title')
Подробнее
@endsection
@section('content')
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-12">
           <h3 >Подробнее об услуге</h3>

           <div  class="d-flex justufy-content-between col-11 mt-5">
                <div>
                    <img src="{{ asset($service->img) }}" style="border-radius: 10px; width:450px" class="shadow" alt="">
                </div>
                <div style="margin-left:30px" >
                    <h3> {{ $service->title }}</h3>
                    <p>{{  $service->category->title }}</p>
                    <p style="font-size:20px">{{  $service->price }}P</p>
                    <p> {{ $service->description }}</p>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn"  style="background-color: #2C58AD; color:white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Записаться на прием
                        </button>

                        @if (session()->has('ok'))
                            <div class="alert alert-success mt-4">
                                {{ session('ok') }}
                            </div>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Зaполните данные</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('clientSave', ['service_id'=>$service->id]) }}" method="post">
                                    @method('post')
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="fio" placeholder="ФИО">
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="phone" placeholder="Телефон">
                                    </div>

                                    <div class="mb-3">
                                        <textarea type="text" class="form-control" name="description" placeholder="Описание запроса"></textarea>
                                    </div>
                                    <button type="submit" class="btn" style="background-color: #2C58AD; color:white">Отправить</button>
                                </form>
                                </div>

                            </div>
                            </div>
                        </div>



                </div>

           </div>


           <h3 class="mt-5">Специалисты по данной услуге</h3>
           <div class="d-flex justify-content-between" style="margin-top:60px">

                @foreach ($doctors as $doctor)
                    @if ($doctor->service_id == $service->id)
                        <div>
                            <img class="shadow rounded" src="{{ asset($doctor->img) }}" style="width: 19vw" alt="">
                            <h5 class="mt-3">{{ $doctor->fio }}</h5>
                            <p>{{ $doctor->special }}</p>
                        </div>
                    @endif
                @endforeach
           </div>
           

        </div>


        </div>
    </div>
</div>
@endsection
