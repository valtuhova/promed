@extends('layout.app')
@section('title')
Услуги
@endsection
@section('content')
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-12">
            <h3>Услуги</h3>

            <div class="d-flex justify-content-between col-11">

                    <form action="{{ route('sort') }}" method="post" class="d-flex justify-content-between mt-4">
                    @csrf
                    @method('post')
                    <select class="form-select" id="select" name="sort">
                    <option selected>Выберите параметр сортировки</option>
                    <option value="price">По цене-возрастание</option>
                    <option value="price-desc">По цене-убывание</option>

                    </select>
                <button style="margin-left:10px" class="btn bg-body-secondary" type="submit">Сортировать</button>
                </form>


            </div>
            <div class="d-flex justify-content-between col-11 mt-4">

                    <div class="container-fluid d-flex flex-wrap align-items-sm-start" style="margin: 0 auto">
                    @foreach($services as $service)
                            <div class="card m-3 pb-2" style="width: 300px; height:420px">
                                <img src="{{$service->img}}"  class="card-img-top" alt="Picture">
                                <div class="card-body">
                                    <div style="height:135px">
                                         <h5 class="card-title">{{$service->title}}</h5>
                                    <p style="font-size: 20px" class="card-title">{{$service->price}}P</p>
                                    <p   class="card-text">{{$service->category->title}}</p>
                                    </div>

                                    <a href="{{ route('detail', ['id'=>$service->id]) }}" class="btn " style="background-color: #2C58AD; color:white">Подробнее </a>
                                </div>

                            </div>
                    @endforeach
                </div>





                 <form action="{{route('filterCategory')}}" method="post" style="width: 140px" class="mt-3">
                    @method('post')
                    @csrf
                    @foreach($categories as $category)

                    <div class="d-flex justify-content-between form-check  mt-2">
                        <input type="checkbox" class="form-check-input" id="{{$category->id}}" value="{{$category->id}}" name="categories[]">
                            <label class="form-check-label"  for="{{$category->id}}">{{$category->title}}</label>
                    </div>

                    @endforeach
                    <div class="d-flex justify-content-between" style="margin-left: 0px;">
                        <button type="submit" class="btn bg-body-secondary mt-3">Фильтр</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
