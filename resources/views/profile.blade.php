@extends('layout.app')
@section('title')
Профиль
@endsection
@section('content')
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-10">

            <div style="margin-left:450px">
                 <img src="{{ asset('public\userprofile.png') }}" class=" shadow" style="border-radius:10px; width:300px" alt="">
                 @foreach ($users as $user)
                <h4 class="mt-3">{{ $user->fio }}</h4>
                 @endforeach
            </div>

            <h3 class="mt-5">Подтвержденные заявки</h3>

            <table class="table mt-4">
                <thead>
                    <tr>
                    <th scope="col">ФИО</th>
                    <th scope="col">Услуга</th>
                    <th scope="col">Статус заявки</th>
                    <th scope="col">Дата записи</th>
                    <th scope="col">Время записи</th>
                    <th scope="col">ФИО врача</th>

                  </tr>
                 </thead>
                 <tbody>
                    @foreach ($clients as $client )
                    @if($client->application->status == 'Подтверждено')
                    <tr>
                    <td>{{$client->fio  }}</td>
                    <td>{{$client->application->service->title }}</td>
                    <td >{{ $client->application->status }}</td>
                    <td >{{ date('d-m-Y', strtotime($client->application->date )) }}</td>
                    <td >{{ date('H:i', strtotime($client->application->time )) }}</td>
                    <td>{{ $client->application->doctor->fio }}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
              </table>


              <h3 class="mt-5">Отклоненные заявки</h3>

              <table class="table mt-4">
                  <thead>
                      <tr>
                      <th scope="col">ФИО</th>
                      <th scope="col">Услуга</th>
                      <th scope="col">Статус</th>
                      <th scope="col">Причина отмены заявки </th>

                    </tr>
                   </thead>
                   <tbody>
                      @foreach ($clients as $client )
                      @if($client->application->status == 'Отклонено')
                      <tr>
                      <td>{{$client->fio  }}</td>
                      <td>{{$client->application->service->title }}</td>
                      <td >{{ $client->application->status }}</td>
                      <td>{{ $client->application->reason }}</td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>

        </div>
    </div>
</div>
@endsection
