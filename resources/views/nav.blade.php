{{-- ナビバー --}}
<nav class="navbar navbar-expand navbar-dark bg-warning">
    <a class="navbar-brand" href="/">
        <i class="fas fa-carrot"></i>
        <span class="font">ベジコネ</span>
    </a>
    <ul class="navbar-nav ml-auto">

        {{-- 未ログイン時の表示 --}}
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
            </li>
        @endguest

        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                <a class="nav-link" href="{{ route('restaurant.login') }}">飲食店ログイン</a>
            </li>
        @endguest

        @guest
            <li class="nav-item">
                <a class="nav-link" href=""></i>ゲストログイン</a>
            </li>
        @endguest

        {{-- ログイン時に表示 --}}
        @auth
            {{-- ドロップダウン --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <button class="dropdown-item" type="button"
                        onclick="location.href='{{ route('users.show', ['producer_name' => Auth::user()->producer_name]) }}'">
                        マイページ
                    </button>
                    <div class="dropdown-divider"></div>
                    <button form="logout-button" class="dropdown-item" type="submit">
                        ログアウト
                    </button>
                </div>
            </li>
            <form id="logout-button" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>

            {{-- ドロップダウンここまで --}}
        @endauth

    </ul>

</nav>
