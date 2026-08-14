@extends('layouts.app')

@section('content')

{{-- 投稿フォーム --}}
<div class="post-create-area">

    {{-- バリデーションエラー --}}
    @if ($errors->any())
        <div class="validation-errors">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif


    <form action="{{ url('/post/create') }}" method="POST" class="post-create-form">
        @csrf

        <img
            src="{{ Auth::user()->icon_image_url }}"
            alt="{{ Auth::user()->username }}のアイコン"
            class="post-create-icon"
        >

        <label for="post" class="visually-hidden">
         投稿内容
         </label>

            <textarea
                id="post"
                name="post"
                class="post-create-textarea"
                placeholder="投稿内容を入力してください"
                maxlength="150"
            >{{ old('post') }}</textarea>

         <button type="submit" class="post-create-button">
            <img src="{{ asset('images/post.png') }}" alt="投稿">
        </button>
    </form>
</div>


{{-- 投稿一覧 --}}
<div class="post-list">

    @forelse ($posts as $post)
        <div class="post-box">

            {{-- ユーザーアイコン --}}
            <a href="{{ url('/user/profile/' . $post->user->id) }}">
                <img
                    src="{{ $post->user->icon_image_url }}"
                    alt="{{ $post->user->username }}のアイコン"
                    class="post-icon"
                >
            </a>

            <div class="post-main">

                <div class="post-header">
                    {{-- ユーザー名 --}}
                    <a
                        href="{{ url('/user/profile/' . $post->user->id) }}"
                        class="post-username">
                        {{ $post->user->username }}
                    </a>

                    {{-- 投稿日時 --}}
                    <p class="post-date">
                        {{ $post->created_at->format('Y-m-d H:i') }}
                    </p>
                </div>

                {{-- 投稿内容 --}}
                <p class="post-text">
                    {{ $post->post }}
                </p>
            </div>

            {{-- 自分の投稿だけ操作可能 --}}
            @if ($post->user_id === Auth::id())
                <div class="post-actions">

                    <button
                        type="button"
                        class="edit-btn"
                        data-id="{{ $post->id }}"
                        data-post="{{ $post->post }}"
                    >
                        <img src="{{ asset('images/edit.png') }}" alt="編集">
                    </button>


                    {{-- 削除ボタン --}}
                    <button
                        type="button"
                        class="delete-btn"
                        data-id="{{ $post->id }}"
                    >
                        <img src="{{ asset('images/trash.png') }}" alt="削除">
                    </button>


                </div>
            @endif

        </div>
    @empty
        <p class="no-post-message">
            まだ投稿がありません。
        </p>
    @endforelse

</div>


<label for="editPostText" class="visually-hidden">
    投稿内容
</label>

{{-- 編集モーダル --}}
<div id="editModal" class="modal">

    <div class="modal-content">

        <form action="{{ url('/post/update') }}" method="POST">
            @csrf

            <input
                type="hidden"
                name="id"
                id="editPostId"
            >

            <textarea
                name="post"
                id="editPostText"
                maxlength="150"
            ></textarea>

            <button type="submit" class="update-btn">
                更新
            </button>

            <button
                type="button"
                id="closeEditModal"
                class="modal-close-btn"
            >
                キャンセル
            </button>
        </form>

    </div>

</div>


{{-- 削除確認モーダル --}}
<div id="deleteModal" class="modal">

    <div class="modal-content delete-modal-content">

        <p class="delete-confirm-message">
            この投稿を削除しますか？
        </p>

        <form action="{{ url('/post/delete') }}" method="POST">
            @csrf

            <input
                type="hidden"
                name="id"
                id="deletePostId"
            >

            <div class="delete-modal-actions">

                <button type="submit" class="delete-confirm-btn">
                    削除する
                </button>

                <button
                    type="button"
                    id="closeDeleteModal"
                    class="modal-close-btn"
                >
                    キャンセル
                </button>

            </div>
        </form>

    </div>

</div>

@endsection
