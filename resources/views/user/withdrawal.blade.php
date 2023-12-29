@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column">
                                <div class="text-center">
                                    <div><h3>Вывод средств</h3></div>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <div>
                                        На текущий момент вывод баланса осуществляется переводом на каспи.
                                        Прошу отнестись с пониманием. Запрос обработается в течении 10 минут, максимально 1 день.
                                    </div>
                                </div>
                                <form action="{{ route('balance.withdrawal') }}" method="POST">
                                    @csrf
                                    <div class="mt-3">
                                        <label for="fromSend" class="form-label"><strong>Имя получателя</strong></label>
                                        <input type="text" class="form-control" name="full_name" id="fromSend" placeholder="Бердибек Н" required>
                                    </div>
                                    <div class="mt-3">
                                        <label for="transferSum" class="form-label"><strong>Сумма вывода</strong></label>
                                        <input type="number" class="form-control" name="amountSum" id="transferSum" placeholder="1000" required>
                                    </div>
                                    <div class="mt-3">
                                        <figcaption class="blockquote-footer">
                                            Минимально 1000тг
                                        </figcaption>
                                    </div>
                                    <div class="mt-3">
                                        <label for="transferSum" class="form-label"><strong>Номер телефона для перевода</strong></label>
                                        <input type="number" class="form-control" name="phone_number" id="transferSum" placeholder="87774448811" required>
                                    </div>
                                    <div class="mt-2 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Отправить</button>
                                    </div>
                                    <div class="mt-3 text-center" style="color: #476693;">
                                        <a class="icon-link icon-link-hover" style="--bs-link-hover-color-rgb: 25, 135, 84;" href="{{ route('balance') }}">
                                            Хотите пополнить баланс?
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
