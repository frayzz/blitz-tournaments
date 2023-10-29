<ul class="nav nav-pills nav-fill p-5">
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

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <div class="btn-group">
                        <div type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Профиль</a>
                            <div class="dropdown-divider"></div>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link class="dropdown-item" :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>


                @else
                    <a href="{{ route('login') }}" class="btn">Войти</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-dark">Зарегестрироваться</a>
                    @endif
                @endauth
            </div>
        @endif


    </li>
</ul>
