@extends('layouts.app')
@section('content')

{{-- ① 投稿フォーム --}}
@foreach($posts as $post)
    <div class="post-box">

        {{-- 編集ボタン（自分の投稿だけ） --}}
        @if($post->user_id === Auth::id())
            <button class="edit-btn"
                    data-id="{{ $post->id }}"
                    data-post="{{ $post->post }}">
                <img src="/images/edit.png" alt="編集">
            </button>

            {{-- 削除ボタン --}}
            <form action="/post/delete" method="POST" class="delete-form">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <button type="submit" class="delete-btn">
                    <img src="/images/delete.png" class="delete-img" alt="削除">
                </button>
            </form>
        @endif

        {{-- ユーザーアイコン --}}
        <img src="{{ $post->user->images }}" class="post-icon">

        {{-- ユーザー名 --}}
        <p class="post-username">{{ $post->user->username }}</p>

        {{-- 投稿内容 --}}
        <p>{{ $post->post }}</p>

        {{-- 投稿日時 --}}
        <p class="post-date">{{ $post->created_at }}</p>

    </div>
@endforeach


{{-- ③ 編集モーダル --}}
<div id="editModal" class="modal">
    <div class="modal-content">
        <form action="/post/update" method="POST">
            @csrf
            <input type="hidden" name="id" id="editPostId">
            <textarea name="post" id="editPostText"></textarea>
            <button type="submit" class="update-btn">
                <img src="/images/update.png" alt="更新">
            </button>
        </form>
    </div>
</div>

@endsection
