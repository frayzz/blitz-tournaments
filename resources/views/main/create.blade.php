@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="">Создать турнир</h1>
            <form action="/matches" method="POST">
                @csrf
                <h6 class="mt-5 fw-bold">Игра ( На данный момент только MLBB )</h6>
                <input type="hidden" name="name" value="tournament">
                <div class="col-4 p-0 m-1">
                    <select class="form-select" name="game_type" aria-label="Disabled select example" disabled>
                        <option selected value="mlbb">Mobile Legends: Bang Bang</option>
                    </select>
                </div>
                <h6 class="mt-2 fw-bold">Сумма ставки</h6>
                <div class="col-4 p-0 m-1">
                    <input class="form-control betAmount" type="number" placeholder="Сумма ставки" aria-label="default input example" name="amountSum">
                </div>
                <div>
                    <div class="fw-light fst-italic fs-10">Минимальная ставка 1 000тг*</div>
                </div>
                <div class="d-flex">
                    <div class="">Сумма выйграша составит: </div>
                    <div class="ml-2 winSum" style="color: #169B00;">0тг</div>
                </div>
                <!--
                <h6 class="mt-2">Прямая трансляция в TikTok</h6>
                <div class="form-check form-switch m-1">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Стрим в TikTok( Большое время ожидания )</label>
                </div>
                -->
                <h6 class="mt-2 fw-bold">Количество игроков</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="number_of_players" id="inlineRadio1" value="2">
                    <label class="form-check-label" for="inlineRadio1">1vs1 <img src="{{ asset('img/userCol.png') }}" alt=""></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="number_of_players" id="inlineRadio2" value="6">
                    <label class="form-check-label" for="inlineRadio2">3vs3 <img src="{{ asset('img/teamCol.png') }}" alt=""></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="number_of_players" id="inlineRadio2" value="10">
                    <label class="form-check-label" for="inlineRadio2">5vs5 <img src="{{ asset('img/teamCol.png') }}" alt=""></label>
                </div>
                <div class="col-4 mt-4">
                    <button type="submit" class="btn btn-outline-success">Отправить</button>
                </div>
            </form>
        </div>
    </div>
@endsection


