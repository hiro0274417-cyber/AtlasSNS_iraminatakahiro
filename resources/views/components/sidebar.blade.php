<div class="sidebar">

    <p>フォロー：{{ Auth::user()->followings()->count() }}</p>
    <p>フォロワー：{{ Auth::user()->followers()->count() }}</p>

    <a href="/follow-list">フォローリスト</a>
    <a href="/follower-list">フォロワーリスト</a>
    <a href="/search">ユーザー検索</a>

</div>
