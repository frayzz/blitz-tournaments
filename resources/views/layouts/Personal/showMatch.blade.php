@extends('layouts.app')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen pt-10 py-4 sm:pt-0">
        <div class="mx-auto sm:px-6 lg:px-8 cr-white w-100 mt-5">
            <div class="d-flex justify-content-center align-items-center">
                <div class="ml-2 mr-2">
                    <h3><a href="{{ route('profile', $match->creator->id) }}">{{ $match->creator->name }}</a></h3>
                </div>
                <div class="ml-2 mr-2">
                    <img src="{{ asset('img/versus.gif') }}" style="width: 50px" alt="VS">
                </div>
                @if ($match->opponent)
                    <div class="ml-2 mr-2">
                        <h3><a href="{{ route('profile', $match->opponent->id) }}">{{ $match->opponent->name }}</a></h3>
                    </div>
                @else
                    <div class="ml-2 mr-2">
                        <h3>Оппонент еще не определен</h3>
                    </div>
                @endif
            </div>

            <div>
                Статус матча: {{ $match->status }}
            </div>
            <div>
                Порядковый номер матча: {{ $match->id }}
            </div>



            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Начало
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="alert alert-danger" role="alert">
                                <strong>Добавьте друг друга в друзья и начинайте матч!</strong>
                                После завершения прикрепите скриншот завершения в разделе <strong>*Подведение итогов*</strong>.
                            </div>
                            <div>
                                <div>
                                    ID игрока {{ $match->creator->name }}.
                                </div>
                                <button type="button" class="btn btn-outline-secondary copy-btn" data-copy-text="Текст для копирования 1">Скопировать ID</button>
                            </div>
                            <div>
                                <div>
                                    ID игрока {{ $match->opponent->name }}.
                                </div>
                                <button type="button" class="btn btn-outline-secondary copy-btn" data-copy-text="Текст для копирования 2">Скопировать ID</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Пример скриншота
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <img src="{{ asset('img/screen-example.jpg') }}" style="width: 100%" alt="">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Подведение итогов
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            После отправки скриншота с результатами оператор примет решение кто <strong>выиграл</strong>, и начслит баланс.
                        </div>

                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="p-2">
                <form action="{{ route('matches.result.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tournament_id" value="{{ $match->id }}">
                    <input type="hidden" name="status" value="{{ $match->status }}">
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <div>
                        <label for="formFileLg" class="form-label"></label>
                        <input class="form-control form-control-lg" name="photo_path" id="formFileLg" type="file">
                    </div>
                    <button class="btn btn-primary mt-2" type="submit">Отправить результаты</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.copy-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                // Получаем текст для копирования из атрибута data-copy-text
                var textToCopy = this.getAttribute('data-copy-text');

                // Создаем временный элемент input
                var tempInput = document.createElement('input');
                tempInput.value = textToCopy;
                document.body.appendChild(tempInput);

                // Копируем текст в буфер обмена
                tempInput.select();
                document.execCommand('copy');

                // Удаляем временный input
                document.body.removeChild(tempInput);

                // Опционально: отображаем уведомление о копировании
                alert('Текст скопирован: ' + textToCopy);
            });
        });
    </script>
@endsection
