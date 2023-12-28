@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-10 pb-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 mt-5">
                <div class="table-responsive">
                    <table class="table tournament_styles">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Игрок 1</th>
                            <th scope="col">Игрок 2</th>
                            <th scope="col">Количество игроков</th>
                            <th scope="col">Ставка</th>
                            <th scope="col">Игра</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($matches as $match)
                            <tr>
                                <td>
                                    <a href="{{ route('matches.show', $match->id) }}" class="btn btn-info" style="color:white">Просмотр</a>
                                </td>
                                <td>
                                    <a href="{{ route('profile', $match->creator->id) }}">{{ $match->creator->name }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('profile', $match->opponent->id) }}">{{ $match->opponent->name }}</a>
                                </td>
                                <td>
                                    {{ $match->number_of_players }}
                                </td>
                                <td class="font-weight-bolder" style="color:#169B00">{{ $match->amountSum }}тг</td>
                                <td><img src="{{ asset('img/ml_icon.png') }}" alt=""></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
