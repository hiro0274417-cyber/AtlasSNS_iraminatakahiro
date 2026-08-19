<header class="header">

        <a href="{{ url('/top') }}" class="atlas-logo">
            <img src="{{ asset('images/atlas-logo.png') }}" alt="Atlas">
        </a>
    <nav
        class="header-user-menu"
        aria-label="ユーザーメニュー"
    >
        <div class="menu-title">

            <span class="header-user-name">
                {{ Auth::user()->username }} さん
            </span>

            <button
                type="button"
                class="menu-arrow-button"
                id="userMenuButton"
                aria-controls="menuList"
                aria-expanded="false"
                aria-label="メニューを開く"
            >
                <span class="menu-arrow" aria-hidden="true"></span>
            </button>

            <span class="header-user-image">
                <img
                    src="{{ Auth::user()->icon_image_url }}"
                    alt="{{ Auth::user()->username }}のアイコン"
                    class="header-user-icon"
                >
            </span>
        </div>
        <ul id="menuList" class="menu-list">

            <li>
                <a href="{{ url('/top') }}">
                    HOME
                </a>
            </li>

            <li>
                <a href="{{ url('/profile/edit') }}">
                    プロフィール編集
                </a>
            </li>

            <li>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf

                    <button type="submit">
                        ログアウト
                    </button>
                </form>
            </li>

        </ul>
    </nav>

</header>
