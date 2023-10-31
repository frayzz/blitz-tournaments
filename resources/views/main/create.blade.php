@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="">Создать турнир</h1>
            <h6 class="mt-5">Игра ( На данный момент только MLBB )</h6>
            <div class="col-4 p-0 m-1">
                <select class="form-select" aria-label="Disabled select example" disabled>
                    <option selected>Mobile Legends: Bang Bang</option>
                </select>
            </div>
            <h6 class="mt-2">Сумма ставки</h6>
            <div class="col-4 p-0 m-1">
                <input class="form-control" type="text" placeholder="Сумма ставки" aria-label="default input example">
            </div>
            <h6 class="mt-2">Прямая трансляция в TikTok</h6>
            <div class="form-check form-switch m-1">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Стрим в TikTok( Большое время ожидания )</label>
            </div>
            <h6 class="mt-2">Количество игроков</h6>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">1vs1 <img src="{{ asset('img/userCol.png') }}" alt=""></label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">5vs5 <img src="{{ asset('img/teamCol.png') }}" alt=""></label>
            </div>
            <div class="col-4 mt-4">
                <button type="button" class="btn btn-outline-success">Отправить</button>
            </div>
        </div>
    </div>
@endsection
