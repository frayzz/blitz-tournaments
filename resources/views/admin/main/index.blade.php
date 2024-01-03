@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Главная страница</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная страница</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $data['usersCount'] }}</h3>

                            <p>Пользователи</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('admin.user.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Решение игр</h4>
                </div><!-- /.col -->
            </div>
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Фото Игрока 1</th>
                                <th>Фото Игрока 2</th>
                                <th colspan="2" class="text-center">Кто победил?</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['summarizingGames'] as $game)
                                <tr>
                                    <td>{{ $game->id }}</td>
                                    <!-- Фото создателя турнира -->
                                    <td>
                                        @php
                                            $creatorResult = $game->results->firstWhere('user_id', $game->creator_id);
                                        @endphp
                                        @if($creatorResult && $creatorResult->photo_path)
                                            <a href="{{ asset('storage/' . $creatorResult->photo_path) }}" alt="Игрок 1" width="100">Скрин: {{ $game->creator->name }}</a>
                                        @else
                                            <span>Нет фото</span>
                                        @endif
                                    </td>
                                    <!-- Фото оппонента -->
                                    <td>
                                        @php
                                            $opponentResult = $game->results->firstWhere('user_id', $game->opponent_id);
                                        @endphp
                                        @if($opponentResult && $opponentResult->photo_path)
                                            <a href="{{ asset('storage/' . $opponentResult->photo_path) }}">Скрин: {{ $game->opponent->name }}</a>
                                        @else
                                            <span>Нет фото</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.winner', $game->creator->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="winner_id" value="{{ $game->creator->id }}">
                                            <button type="submit" class="btn btn-success">{{ $game->creator->name }}</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.winner', $game->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="winner_id" value="{{ $game->opponent->id }}">
                                            <button type="submit" class="btn btn-success">{{ $game->opponent->name }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Пополнение и вывод баланса</h4>
                </div><!-- /.col -->
            </div>
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Тип операции</th>
                                <th>Телефон</th>
                                <th>Сумма</th>
                                <th>ФИО</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['balanceTransactions'] as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <!-- Фото создателя турнира -->
                                    <td>
                                        @if($transaction->operation_type == 'deposit')
                                            <div>Пополнение баланса</div>
                                        @elseif($transaction->operation_type == 'withdrawal')
                                            <div>Вывод средств</div>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $transaction->phone_number }}
                                    </td>
                                    <!-- Фото оппонента -->
                                    <td>
                                        {{ $transaction->amountSum }}
                                    </td>
                                    <td>
                                        {{ $transaction->full_name }}
                                    </td>
                                    <td>
                                        @if($transaction->operation_type == 'deposit')
                                            <form action="{{ route('balance.deposit.accept', $transaction->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Пополнить</button>
                                            </form>
                                        @elseif($transaction->operation_type == 'withdrawal')
                                            <form action="{{ route('balance.withdrawal.accept', $transaction->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">Вывести средства</button>
                                            </form>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
