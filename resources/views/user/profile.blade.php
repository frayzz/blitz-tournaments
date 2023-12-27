@extends('layouts.app')

@section('content')
<div class="container">
    <div class="main-body">


        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ asset('img/user.png') }}" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>{{ $user->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        @if($user->profile->telegram)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30" class="feather feather-github mr-2 icon-inline">
                                        <path d="M 25.154297 3.984375 C 24.829241 3.998716 24.526384 4.0933979 24.259766 4.2011719 C 24.010014 4.3016357 23.055766 4.7109106 21.552734 5.3554688 C 20.048394 6.0005882 18.056479 6.855779 15.931641 7.7695312 C 11.681964 9.5970359 6.9042108 11.654169 4.4570312 12.707031 C 4.3650097 12.746607 4.0439208 12.849183 3.703125 13.115234 C 3.3623292 13.381286 3 13.932585 3 14.546875 C 3 15.042215 3.2360676 15.534319 3.5332031 15.828125 C 3.8303386 16.121931 4.144747 16.267067 4.4140625 16.376953 C 5.3912284 16.775666 8.4218473 18.015862 8.9941406 18.25 C 9.195546 18.866983 10.29249 22.222526 10.546875 23.044922 C 10.714568 23.587626 10.874198 23.927519 11.082031 24.197266 C 11.185948 24.332139 11.306743 24.45034 11.453125 24.542969 C 11.511635 24.579989 11.575789 24.608506 11.640625 24.634766 L 11.644531 24.636719 C 11.659471 24.642719 11.67235 24.652903 11.6875 24.658203 C 11.716082 24.668202 11.735202 24.669403 11.773438 24.677734 C 11.925762 24.726927 12.079549 24.757812 12.216797 24.757812 C 12.80196 24.757814 13.160156 24.435547 13.160156 24.435547 L 13.181641 24.419922 L 16.191406 21.816406 L 19.841797 25.269531 C 19.893193 25.342209 20.372542 26 21.429688 26 C 22.057386 26 22.555319 25.685026 22.875 25.349609 C 23.194681 25.014192 23.393848 24.661807 23.478516 24.21875 L 23.478516 24.216797 C 23.557706 23.798129 26.921875 6.5273437 26.921875 6.5273438 L 26.916016 6.5507812 C 27.014496 6.1012683 27.040303 5.6826405 26.931641 5.2695312 C 26.822973 4.8564222 26.536648 4.4608905 26.181641 4.2480469 C 25.826669 4.0352506 25.479353 3.9700339 25.154297 3.984375 z M 24.966797 6.0742188 C 24.961997 6.1034038 24.970391 6.0887279 24.962891 6.1230469 L 24.960938 6.1347656 L 24.958984 6.1464844 C 24.958984 6.1464844 21.636486 23.196371 21.513672 23.845703 C 21.522658 23.796665 21.481573 23.894167 21.439453 23.953125 C 21.379901 23.91208 21.257812 23.859375 21.257812 23.859375 L 21.238281 23.837891 L 16.251953 19.121094 L 12.726562 22.167969 L 13.775391 17.96875 C 13.775391 17.96875 20.331562 11.182109 20.726562 10.787109 C 21.044563 10.471109 21.111328 10.360953 21.111328 10.251953 C 21.111328 10.105953 21.035234 10 20.865234 10 C 20.712234 10 20.506484 10.14875 20.396484 10.21875 C 18.963383 11.132295 12.671823 14.799141 9.8515625 16.439453 C 9.4033769 16.256034 6.2896636 14.981472 5.234375 14.550781 C 5.242365 14.547281 5.2397349 14.548522 5.2480469 14.544922 C 7.6958673 13.491784 12.47163 11.434667 16.720703 9.6074219 C 18.84524 8.6937992 20.838669 7.8379587 22.341797 7.1933594 C 23.821781 6.5586849 24.850125 6.1218894 24.966797 6.0742188 z"></path>
                                    </svg>Telegram
                                </h6>
                                <span class="text-secondary">{{  $user->profile->telegram }}</span>
                            </li>
                        @endif
                        @if($user->profile->steam)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"width="24" height="24" viewBox="0 0 26 26" class="feather feather-github mr-2 icon-inline">
                                        <path d="M 4.875 0 C 2.183594 0 0 2.183594 0 4.875 L 0 13.34375 L 5.0625 14.8125 C 5.992188 13.664063 7.40625 12.9375 9 12.9375 C 9.050781 12.9375 9.105469 12.9375 9.15625 12.9375 L 11.9375 9.0625 C 11.9375 9.039063 11.9375 9.023438 11.9375 9 C 11.9375 5.65625 14.652344 2.9375 18 2.9375 C 21.347656 2.9375 24.0625 5.65625 24.0625 9 C 24.0625 12.347656 21.347656 15.0625 18 15.0625 C 17.96875 15.0625 17.9375 15.0625 17.90625 15.0625 L 14.0625 17.84375 C 14.066406 17.894531 14.0625 17.949219 14.0625 18 C 14.0625 20.800781 11.800781 23.0625 9 23.0625 C 6.40625 23.0625 4.300781 21.109375 4 18.59375 L 0 17.4375 L 0 21.125 C 0 23.816406 2.183594 26 4.875 26 L 21.125 26 C 23.816406 26 26 23.816406 26 21.125 L 26 4.875 C 26 2.183594 23.816406 0 21.125 0 Z M 18 4.78125 C 15.675781 4.78125 13.78125 6.671875 13.78125 9 C 13.78125 11.328125 15.675781 13.21875 18 13.21875 C 20.324219 13.21875 22.21875 11.328125 22.21875 9 C 22.21875 6.671875 20.324219 4.78125 18 4.78125 Z M 18 6.0625 C 19.617188 6.0625 20.9375 7.382813 20.9375 9 C 20.9375 10.617188 19.617188 11.9375 18 11.9375 C 16.386719 11.9375 15.0625 10.617188 15.0625 9 C 15.0625 7.382813 16.386719 6.0625 18 6.0625 Z M 9 14.5625 C 8.175781 14.5625 7.4375 14.859375 6.84375 15.34375 L 9.375 16.0625 C 9.394531 16.066406 9.417969 16.089844 9.4375 16.09375 L 9.5 16.09375 C 10.351563 16.3125 10.96875 17.085938 10.96875 18 C 10.96875 19.085938 10.085938 19.96875 9 19.96875 C 8.792969 19.96875 8.59375 19.9375 8.40625 19.875 L 5.75 19.125 C 6.214844 20.480469 7.488281 21.4375 9 21.4375 C 10.90625 21.4375 12.4375 19.90625 12.4375 18 C 12.4375 16.09375 10.90625 14.5625 9 14.5625 Z"></path>
                                    </svg>Steam
                                </h6>
                                <span class="text-secondary">{{ $user->profile->steam }}</span>
                            </li>
                        @endif
                        @if($user->profile->instagram)
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>Instagram
                                    </h6>
                                    <span class="text-secondary">{{ $user->profile->instagram }}</span>
                                </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4>Статистика</h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Побед</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                2
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Поражений</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                3
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h4>Последние игры</h4>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-sm-3 text-secondary">
                                <h6 class="mb-0 alert alert-success">Победа</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">alexretr0</h6>
                            </div>
                            <div class="col-sm-1">
                                <h6 class="mb-0">vs</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Resten</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-sm-3 text-secondary">
                                <h6 class="mb-0 alert alert-danger">Поражение</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">alexretr0</h6>
                            </div>
                            <div class="col-sm-1">
                                <h6 class="mb-0">vs</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Resten</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-sm-3 text-secondary">
                                <h6 class="mb-0 alert alert-danger">Поражение</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">alexretr0</h6>
                            </div>
                            <div class="col-sm-1">
                                <h6 class="mb-0">vs</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Resten</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-sm-3 text-secondary">
                                <h6 class="mb-0 alert alert-danger">Поражение</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">alexretr0</h6>
                            </div>
                            <div class="col-sm-1">
                                <h6 class="mb-0">vs</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Resten</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-sm-3 text-secondary">
                                <h6 class="mb-0 alert alert-success">Победа</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">alexretr0</h6>
                            </div>
                            <div class="col-sm-1">
                                <h6 class="mb-0">vs</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Resten</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
