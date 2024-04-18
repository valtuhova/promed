@extends('layout.app')
@section('title')
Специалисты
@endsection
@section('content')
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-9">
            <h3>Специалисты</h3>

            <form action="{{ route('doctor') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <input type="text" name="fio" placeholder="ФИО" class="form-control">
                </div>

                <div class="mb-3">
                    <input type="text" name="special" placeholder="Специальность" class="form-control">
                </div>

                <div class="mb-3">
                    <input type="file" name="img" placeholder="Загрузите изображение" class="form-control">
                </div>

                <div class="mb-3">
                    <select class="form-select" name="service">
                    <option desabled selected>Выберите услугу</option>
                    @foreach ($services as $service )
                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                    @endforeach
                  </select>
                </div>

                <button type="submit" class="btn" style="background-color: #2C58AD; color:white">Сохранить</button>
            </form>

            <table class="table mt-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Изображение</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Специальность</th>
                    <th scope="col">Услуга</th>
                    <th></th>

                  </tr>
                </thead>
                <tbody>

                    @foreach ($doctors as $doctor )
                    <tr>
                    <th scope="row">{{ $doctor->id }}</th>
                    <td class="w-25"><img src="{{ asset($doctor->img) }}" class="w-100" alt=""></td>
                    <td>{{ $doctor->fio }}</td>
                    <td>{{ $doctor->special }}</td>
                    <td>{{ $doctor->service->title }}</td>
                    <td>
                        <a href="{{ route('deleteDoctor', ['doctor'=>$doctor]) }}" style="color: white" class="btn bg-secondary">Удалить</a>
                    </td>
                    </tr>
                    @endforeach



                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
