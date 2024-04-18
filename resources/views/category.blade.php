@extends('layout.app')
@section('title')
Категории услуг
@endsection
@section('content')
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-5">
            <h3>Категории услуг</h3>

            <form action="{{ route('categorySave') }}" method="post">
                @csrf
                @method('post')
                <div class="mb-3">
                    <input type="text" name="title" placeholder="Название" class="form-control">
                </div>
                <button type="submit" class="btn" style="background-color: #2C58AD; color:white">Сохранить</button>
            </form>

            <table class="table mt-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col"></th>

                  </tr>
                </thead>
                <tbody>

                    @foreach ($categories as $category )
                    <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->title }}</td>
                    <td>
                        <a href="{{ route('deleteCategory', ['category'=>$category]) }}" style="color: white" class="btn bg-secondary">Удалить</a>
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
