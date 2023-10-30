@extends('layouts.app')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen pt-10 py-4 sm:pt-0">
        <div class="mx-auto sm:px-6 lg:px-8 cr-white w-100 mt-5">
            <td><a href="{{ route('matches.create') }}"><button class="p-3 font-weight-bolder mb-5" style="background-color: #3BC8F5; color: white;border-radius: 20px;">Создать матч</button></a></td>
            <table class="table tournament_styles">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Ник</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Ставка</th>
                        <th scope="col">Действие</th>
                        <th scope="col">Игра</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><img src="{{ asset('img/user.png') }}"></th>
                        <td>DibloWreck</td>
                        <td><img src="{{ asset('img/userCol.png') }}">1vs1<img src="{{ asset('img/userCol.png') }}"></td>
                        <td class="font-weight-bolder" style="color:#169B00">10 000тг</td>
                        <td><button type="button" class="p-3 font-weight-bolder" style="background-color: #00FF85; color: black;border-radius: 20px;"><img src="{{ asset('img/fight.png') }}" style="width: 25px; margin-right: 12px;">Принять вызов</button></td>
                        <td><img src="{{ asset('img/ml_icon.png') }}"></td>
                    </tr>
                    <tr>
                        <th><img src="{{ asset('img/user.png') }}"></th>
                        <td>Tither</td>
                        <td><img src="{{ asset('img/teamCol.png') }}">5vs5<img src="{{ asset('img/teamCol.png') }}"></td>
                        <td class="font-weight-bolder" style="color:#169B00">70 000тг</td>
                        <td><button type="button" class="p-3 font-weight-bolder" style="background-color: #00FF85; color: black;border-radius: 20px;"><img src="{{ asset('img/fight.png') }}" style="width: 25px; margin-right: 12px;">Принять вызов</button></td>
                        <td><img src="{{ asset('img/ml_icon.png') }}"></td>
                    </tr>
                    <tr>
                        <th><img src="{{ asset('img/user.png') }}"></th>
                        <td>BronzeWL</td>
                        <td><img src="{{ asset('img/teamCol.png') }}">5vs5<img src="{{ asset('img/teamCol.png') }}"></td>
                        <td class="font-weight-bolder" style="color:#169B00">150 000тг</td>
                        <td><button type="button" class="p-3 font-weight-bolder" style="background-color: #00FF85; color: black;border-radius: 20px;"><img src="{{ asset('img/fight.png') }}" style="width: 25px; margin-right: 12px;">Принять вызов</button></td>
                        <td><img src="{{ asset('img/ml_icon.png') }}"></td>
                    </tr>
                    <tr>
                        <th><img src="{{ asset('img/user.png') }}"></th>
                        <td>Big Baby</td>
                        <td><img src="{{ asset('img/userCol.png') }}">1vs1<img src="{{ asset('img/userCol.png') }}"></td>
                        <td class="font-weight-bolder" style="color:#169B00">15 000тг</td>
                        <td><button type="button" class="p-3 font-weight-bolder" style="background-color: #00FF85; color: black;border-radius: 20px;"><img src="{{ asset('img/fight.png') }}" style="width: 25px; margin-right: 12px;">Принять вызов</button></td>
                        <td><img src="{{ asset('img/ml_icon.png') }}"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection


