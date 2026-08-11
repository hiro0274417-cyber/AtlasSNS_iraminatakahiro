<aside class="sidebar">

    <section class="sidebar-status">

    <p class="sidebar-username">
        {{ Auth::user()->username }}さんの
    </p>

    <div class="sidebar-count-block">
        <p>
            <span>フォロー数</span>
            <span>{{ Auth::user()->followings()->count() }}人</span>
        </p>

        <a href="{{ url('/follow-list') }}">
            フォローリスト
        </a>
    </div>

    <div class="sidebar-count-block">
        <p>
            <span>フォロワー数</span>
            <span>{{ Auth::user()->followers()->count() }}人</span>
        </p>

        <a href="{{ url('/follower-list') }}">
            フォロワーリスト
        </a>
    </div>

</section>

    <nav aria-label="サイドメニュー">

        <ul class="sidebar-menu">

            <li>
                <a href="{{ url('/search') }}">
                    ユーザー検索
                </a>
            </li>

        </ul>

    </nav>

</aside>
