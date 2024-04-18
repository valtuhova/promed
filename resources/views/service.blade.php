@extends('layout.app')
@section('title')
Услуги
@endsection
@section('content')
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-12">
            <h3>Услуги</h3>

            <form action="{{ route('service') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <input type="text" name="title" placeholder="Название" class="form-control">
                </div>

                <div class="mb-3">
                    <textarea type="text" name="description" placeholder="Описание" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <input type="number" name="price" placeholder="Стоимость" class="form-control">
                </div>

                <div class="mb-3">
                    <input type="file" name="img" placeholder="Загрузите изображение" class="form-control">
                </div>

                <div class="mb-3">
                    <select class="form-select" name="category">
                    <option desabled selected>Выберите категорию услуги</option>
                    @foreach ($categories as $category )
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
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
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Стоимость</th>
                    <th scope="col">Категория услуги</th>
                    <th></th>

                  </tr>
                </thead>
                <tbody>

                    @foreach ($services as $service )
                    <tr>
                    <th scope="row">{{ $service->id }}</th>
                    <td class="w-25"><img src="{{ asset($service->img) }}" class="w-75" alt=""></td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->category->title }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <div>
                                 <!-- Button trigger modal -->
                        <button type="button" class="btn  bg-body-secondary"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $service->id }}">
                            Редактировать
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $service->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование услуги</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('serviceUpdate', ['service'=>$service]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="mb-3">
                                        <input type="text" name="title" placeholder="Название" class="form-control" value="{{ $service->title }}">
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" name="description" placeholder="Описание" class="form-control" value="{{ $service->description }}">
                                    </div>

                                    <div class="mb-3">
                                        <input type="number" name="price" placeholder="Стоимость" class="form-control" value="{{ $service->price }}">
                                    </div>

                                    <div class="mb-3">
                                        <input type="file" name="img" placeholder="Загрузите изображение" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <select class="form-select" name="category">
                                        <option disabled selected>Выберите категорию услуги</option>
                                        @foreach ($categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                      </select>
                                    </div>

                                    <button type="submit" class="btn" style="background-color: #2C58AD; color:white">Сохранить</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                            </div>


                        <a href="{{ route('deleteService', ['service'=>$service]) }}" style="margin-left:10px;color: white" class="btn bg-secondary">Удалить</a>
                        </div>

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
