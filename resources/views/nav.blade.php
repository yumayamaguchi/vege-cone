{{-- ナビバー --}}
<nav class="navbar navbar-expand navbar-dark bg-warning">
    <a class="navbar-brand" href="/"><i class="fas fa-carrot"></i></i>ベジコネ</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="">ユーザー登録</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">ログイン</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=""></i>ゲストログイン</a>
        </li>
        {{-- ドロップダウン --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-user-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <button class="dropdown-item" type="button" onclick="location.href=''">
                    マイページ
                </button>
                <div class="dropdown-divider"></div>
                <button form="logout-button" class="dropdown-item" type="submit">
                    ログアウト
                </button>
            </div>
        </li>
        <form id="logout-button" method="POST" action="">
        </form>
        {{-- ドロップダウンここまで --}}

    </ul>

</nav>
