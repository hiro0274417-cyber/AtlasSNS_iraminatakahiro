<div class="post-form">
    <img src="{{ Auth::user()->images }}" class="user-icon">

    <form action="/post/create" method="POST">
        @csrf
        <textarea name="post" class="post-text" placeholder="投稿内容を入力してください"></textarea>

        <button type="submit" class="post-btn">
            <img src="/images/post.png" alt="投稿">
        </button>
    </form>
</div>
@foreach($posts as $post)
<div class="post-box">

    {{-- ユーザーアイコン --}}
    <img src="{{ $post->user->images }}" class="post-user-icon">

    <div class="post-content">
        {{-- ユーザー名 --}}
        <p class="post-username">{{ $post->user->username }}</p>

        {{-- 投稿内容 --}}
        <p class="post-text-body">{{ $post->post }}</p>

        {{-- 投稿日時 --}}
        <p class="post-date">{{ $post->created_at }}</p>
    </div>

    {{-- 編集ボタン（自分の投稿のみ） --}}
    @if($post->user_id == Auth::id())
        <button class="edit-btn" data-id="{{ $post->id }}">編集</button>

        {{-- 削除ボタン --}}
        <form action="/post/delete" method="POST" class="delete-form">
            @csrf
            <input type="hidden" name="id" value="{{ $post->id }}">
            <button type="submit" class="delete-btn">
                <img src="/images/trash.png" class="trash-default">
                <img src="/images/trash-hover.png" class="trash-hover">
            </button>
        </form>
    @endif

</div>
@endforeach
{{-- 編集モーダル --}}
<div id="editModal" class="modal">
    <form action="/post/update" method="POST">
        @csrf
        <input type="hidden" id="editPostId" name="id">
        <textarea id="editPostText" name="post"></textarea>
        <button type="submit">更新する</button>
    </form>
</div>

@endsection
