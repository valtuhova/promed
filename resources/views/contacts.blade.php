@extends('layout.app')
@section('title')
Контакты
@endsection
@section('content')
    <div class="container-fluid w-100 p-0 m-0">
                <div >
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A796398d2e373163db9c4ad6f44fb8ed31c145469cfdc58a4659fcf953e05da66&amp;width=100%25&amp;height=276&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4" style="height:400px">

                <h3 class="mt-3">Наши филиалы в Нижнем Новгороде</h3>
                <div class="d-flex justify-content-between mt-4">
                    <div class="shadow p-4 mb-5 bg-body-tertiary rounded">
                    <h4>Медицинский центр PROMed</h4>
                    <p>ул. Такая, 18</p>
                    <p>Контактный номер: 8(909)- 234 -56-49</p>
                    <p>График работы: <br>
                        Понедельник - суббота 8:00-20:00 <br>
                        Воскресенье 9:00-16:00</p>
                    </div>

                    <div class="shadow p-4 mb-5 bg-body-tertiary rounded">
                        <h4>Медицинский центр PROMed</h4>
                        <p>ул. Такая, 40</p>
                        <p>Контактный номер: 8(909)- 456 -34-49</p>
                        <p>График работы: <br>
                            Понедельник - суббота 8:00-20:00 <br>
                            Воскресенье 9:00-16:00</p>
                        </div>

                        <div class="shadow p-4 mb-5 bg-body-tertiary rounded">
                            <h4>Стоматология PROMed</h4>
                            <p>ул. Такая, 2</p>
                            <p>Контактный номер: 8(909)- 89 -56-67</p>
                            <p>График работы: <br>
                                Понедельник - суббота 8:00-20:00 <br>
                                Воскресенье 9:00-16:00</p>
                            </div>

                </div>
            </div>
        </div>
    </div>
@endsection
