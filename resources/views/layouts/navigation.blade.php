<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <a class="navbar-brand" href="{{ route('/') }}">
        <img src="{{ asset('img/logo-blitz.png') }}" style="width:100px;">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/1') ? 'active' : '' }}" href="{{ route('/') }}">Главное</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('/') }}">Турниры онлайн</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('rating') ? 'active' : '' }}" href="{{ route('rating') }}">Рейтинг игроков</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('active') ? 'active' : '' }}" href="{{ route('active') }}">Игры в процессе</a>
            </li>
            <!-- Аутентификация и профиль -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Войти</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile', auth()->id()) }}">Профиль</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Выйти
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="#">Ваш баланс: {{ Auth::user()->profile->balance }}тг</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>

<style>
    .nav-link.active {
        color: black; /* Цвет текста для активного элемента */
        background-color: rgb(0, 123, 255, 0.3); /* Цвет фона для активного элемента */
        border: 1px solid rgb(0, 123, 255);
        border-radius: .25rem; /* Скругление углов */
    }
</style>
