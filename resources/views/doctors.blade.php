@extends('layout.app')
@section('title')
Специалисты
@endsection
@section('content')
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-12">
            <h3>Все специалисты</h3>

            <div class="d-flex justify-content-between col-11">
                <div class="container-fluid d-flex flex-wrap align-items-sm-start" style="margin: 0 auto">
                @foreach($doctors as $doctor)
                        <div class="card m-3 pb-2" style="width: 280px; height: 450px">
                            <img src="{{$doctor->img}}"  class="card-img-top" alt="Picture">
                            <div class="card-body">
                                <h5 class="card-title">{{$doctor->fio}}</h5>
                                <p  class="card-text">{{$doctor->special}}</p>
                            </div>

                        </div>
                @endforeach
            </div>
            <form action="{{route('filter')}}" method="post" class="col-2 mt-3">
                @method('post')
                @csrf
                @foreach($services as $service)
                <div class="form-check mt-2">
                     <input type="checkbox" class="form-check-input" id="{{$service->id}}" value="{{$service->id}}" name="services[]">
                        <label class="form-check-label" for="{{$service->id}}">{{$service->title}}</label>
                </div>

                @endforeach
                <div class="d-flex justify-content-between" style="margin-left: 0px;">
                    <button type="submit" class="btn bg-body-secondary mt-3">Фильтр</button>
                    <a href="{{route('clear')}}"  class="btn bg-body-secondary mt-3" >Очистить</a>
                </div>

            </form>
            </div>

        </div>
    </div>
</div>
@endsection
