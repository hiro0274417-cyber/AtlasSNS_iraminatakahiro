<header class="header">

    <a href="{{ url('/top') }}" class="header-logo">
        Atlas
    </a>

    <nav
        class="header-user-menu"
        aria-label="ユーザーメニュー"
    >
        <button
            type="button"
            class="menu-title"
            id="userMenuButton"
            aria-controls="menuList"
            aria-expanded="false"
        >
            <span>
                {{ Auth::user()->username }} さん
            </span>

            <span class="menu-arrow" aria-hidden="true"></span>

            <span class="header-user-image">
                <img
                    src="{{ Auth::user()->icon_image }}"
                    alt="{{ Auth::user()->username }}のアイコン"
                    class="header-user-icon"
                >
            </span>
        </button>

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
