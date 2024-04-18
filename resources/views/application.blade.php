@extends('layout.app')
@section('title')
Заявки
@endsection
@section('content')
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-11">
            <h3>Заявки</h3>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ФИО </th>
                    <th scope="col">Номер телефона </th>
                    <th scope="col">Описание запроса </th>
                    <th scope="col">Услуга</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Время создания</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client )
                        <tr>
                    <th scope="row">{{ $client->id }}</th>
                    <td>{{ $client->fio }}</td>
                    <td >{{ $client->phone }}</td>
                    <td >{{ $client->description }}</td>
                    <td>{{ $client->application->service->title}}</td>
                    <td >{{ $client->application->status }}</td>
                    <td>
                        {{ date('H:i / d-m-Y ', strtotime($client->created_at)) }}

                    </td>
                    <td>
                        @if ($client->application->status ==='Новая')
                            <div class="d-flex justify-content-between">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-body-secondary"   data-bs-toggle="modal" data-bs-target="#exampleModal{{ $client->id }}">
                                Подтвердить
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $client->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Подтверждение заявки</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('ok', ['application'=>$client->application]) }}" method="post">
                                            @csrf
                                            @method('post')

                                            <div class="mb-3">
                                                <select class="form-select" name="doctor">
                                                    <option disabled selected>Выберите специалиста</option>
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}">{{ $doctor->fio }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <input type="date" class="form-control" name="date">
                                            </div>

                                            <div class="mb-3">
                                                <input type="time" class="form-control" name="time">
                                            </div>

                                            <button type="submit" class="btn" style="background-color: #2C58AD; color:white">Отправить</button>
                                        </form>

                                    </div>
                                </div>
                                </div>
                            </div>

                            <!-- Button trigger modal -->
                            <button type="button" style="color: white; margin-left:10px" class="btn bg-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal1{{ $client->id }}">
                                Отменить
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1{{ $client->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Причина отмены заявки</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('reason',  ['application'=>$client->application->id]) }}" method="post">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="reason" >
                                        </div>
                                        <button type="submit" class="btn" style="background-color: #2C58AD; color:white">Отправить</button>

                                    </form>
                                    </div>

                                </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </td>
                  </tr>
                    @endforeach


                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
