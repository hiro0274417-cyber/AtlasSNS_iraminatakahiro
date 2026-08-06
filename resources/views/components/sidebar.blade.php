<aside class="sidebar">

    <section class="sidebar-status">

        <p>
            フォロー：
            {{ Auth::user()->followings()->count() }}
        </p>

        <p>
            フォロワー：
            {{ Auth::user()->followers()->count() }}
        </p>

    </section>

    <nav aria-label="サイドメニュー">

        <ul class="sidebar-menu">

            <li>
                <a href="{{ url('/follow-list') }}">
                    フォローリスト
                </a>
            </li>

            <li>
                <a href="{{ url('/follower-list') }}">
                    フォロワーリスト
                </a>
            </li>

            <li>
                <a href="{{ url('/search') }}">
                    ユーザー検索
                </a>
            </li>

        </ul>

    </nav>

</aside>
