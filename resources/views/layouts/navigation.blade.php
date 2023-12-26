<ul class="nav nav-pills nav-fill align-items-center p-3">
    <li class="nav-item">
        <a href="{{ route('/') }}">
        <img src="{{ asset("img/logo-blitz.png") }}" style="width:100px;">
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ route('/') }}">Главное</a>
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
    <li class="nav-item">


        <ul class="navbar-nav mt-2 mt-lg-0">
            <li class="nav-item">
            @guest
                <a href="{{ route('login') }}" class="btn">Войти</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-dark">Зарегестрироваться</a>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu justify-center" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile', auth()->id()) }}">Профиль</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </li>

</ul>


