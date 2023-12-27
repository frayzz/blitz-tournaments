@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-10 pb-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 mt-5">
                <a href="{{ route('matches.create') }}" class="btn btn-primary p-3 mb-5" style="background-color: #3BC8F5; border-radius: 20px;">Создать матч</a>

                <div class="table-responsive">
                    <table class="table tournament_styles">
                        <thead>
                        <tr>
                            <th scope="col">Ник</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Ставка</th>
                            <th scope="col">Действие</th>
                            <th scope="col">Игра</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($matches as $match)
                            <tr>
                                <td><a href="{{ route('profile', $match->creator->id) }}">{{ $match->creator->name }}</a></td>
                                <td><img src="{{ asset('img/userCol.png') }}" alt="">1vs1<img src="{{ asset('img/userCol.png') }}" alt=""></td>
                                <td class="font-weight-bolder" style="color:#169B00">{{ $match->amountSum }}тг</td>
                                <td>
                                    <button type="button" class="btn btn-success p-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border-radius: 20px;">
                                        <img src="{{ asset('img/fight.png') }}" style="width: 25px; margin-right: 12px;">Принять вызов
                                    </button>
                                </td>
                                <td><img src="{{ asset('img/ml_icon.png') }}" alt=""></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальное окно -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Подтверждение принятия вызова</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    С вашего баланса удержится указанная сумма ставки.
                </div>
                <div class="modal-footer">
                    <a href="{{ route('takeChallenge', 1) }}" class="btn btn-success">Принять вызов</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endsection


