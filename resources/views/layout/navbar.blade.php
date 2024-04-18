<nav class="navbar navbar-expand-lg " style="background-color:#2C58AD ; height:11vh">
    <div class="container-fluid">
      <a style="margin-left: 40px" class="navbar-brand" href="{{ route('welcome') }}">
        <img src="{{ asset('public\Group 158 (2).png') }}" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 40px">
          <li class="nav-item">
            <a class="nav-link active mt-2" aria-current="page" style="color: white" href="{{ route('welcome') }}">Главная</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active mt-2" aria-current="page" style="color: white" href="{{ route('servicesPage') }}">Услуги</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active mt-2" aria-current="page" style="color: white" href="{{ route('doctorsPage') }}">Специалисты</a>
          </li>



          <li class="nav-item">
            <a class="nav-link active mt-2" aria-current="page" style="color: white" href="{{ route('contacts') }}">Контакты</a>
          </li>
          @auth()
          @if(\Illuminate\Support\Facades\Auth::user() and Illuminate\Support\Facades\Auth::user()->role == '1')
          <li class="nav-item dropdown mt-2" >
            <a style="color: white" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Админ панель
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('categoryPage') }}">Категории услуг</a></li>
              <li><a class="dropdown-item" href="{{ route('servicePage') }}">Услуги</a></li>
              <li><a class="dropdown-item" href="{{ route('doctorPage') }}">Специалисты</a></li>
              <li><a class="dropdown-item" href="{{ route('application') }}">Заявки</a></li>
            </ul>
          </li>
          <li class="nav-item" style="margin-left:520px">
            <a class="nav-link active" aria-current="page" href="{{ route('profile') }}">
            <img src="{{ asset('public\userrr.png') }}" class="w-75" alt="">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active mt-1" aria-current="page" style="color: white;  border: 2px solid white; border-radius:8px; margin-left:10px" href="{{ route('exit') }}">Выход</a>
          </li>

          @elseif(\Illuminate\Support\Facades\Auth::user() and Illuminate\Support\Facades\Auth::user()->role == '0')
          <li class="nav-item" style="margin-left:650px">
            <a class="nav-link active" aria-current="page" href="{{ route('profile') }}">
            <img src="{{ asset('public\userrr.png') }}" class="w-75" alt="">
            </a>
          </li>
             <li class="nav-item">
            <a class="nav-link active mt-1" aria-current="page" style="color: white;  border: 2px solid white; border-radius:8px; margin-left:10px" href="{{ route('exit') }}">Выход</a>
          </li>
          @endif

          @endauth

          @guest
          <li class="nav-item" style="margin-left:590px">
            <a class="nav-link active" aria-current="page" style="color: white; border: 2px solid white; border-radius:8px" href="{{ route('authPage') }}">Войти</a>
          </li>


          <li class="nav-item">
            <a class="nav-link active" aria-current="page" style="color: white;  border: 2px solid white; border-radius:8px; margin-left:20px" href="{{ route('regPage') }}">Регистрация</a>
          </li>
          @endguest



        </ul>
      </div>
    </div>
  </nav>
