@extends('layouts.app')

@section('content')

<div class="user-profile-page">

    {{-- 成功メッセージ --}}
    @if (session('success'))
        <p class="success-message">
            {{ session('success') }}
        </p>
    @endif

    {{-- プロフィール情報 --}}
    <div class="user-profile-header">

        <img
            src="{{ $target->images }}"
            alt="{{ $target->username }}のアイコン"
            class="user-profile-icon"
        >

        <div class="user-profile-information">

            <div class="user-profile-name-row">

                <h1 class="user-profile-name">
                    {{ $target->username }}
                </h1>

                <div class="user-profile-action">

                    {{-- 自分ならプロフィール編集 --}}
                    @if ($isOwnProfile)

                        <a
                            href="{{ url('/profile/edit') }}"
                            class="profile-edit-link"
                        >
                            プロフィール編集
                        </a>

                    {{-- 相手ならフォロー操作 --}}
                    @elseif ($isFollow)

                        <form
                            action="{{ url('/unfollow/' . $target->id) }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="unfollow-button"
                            >
                                フォロー解除
                            </button>
                        </form>

                    @else

                        <form
                            action="{{ url('/follow/' . $target->id) }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="follow-button"
                            >
                                フォローする
                            </button>
                        </form>

                    @endif

                </div>

            </div>

            <p class="user-profile-bio">
                {{ $target->bio ?: '自己紹介文はまだ登録されていません。' }}
            </p>

        </div>

    </div>

    {{-- 投稿一覧 --}}
    <div class="user-profile-posts">

        <h2 class="user-profile-post-title">
            投稿一覧
        </h2>

        @forelse ($target->posts as $post)

            <div class="user-profile-post-box">

                <img
                    src="{{ $target->images }}"
                    alt="{{ $target->username }}のアイコン"
                    class="user-profile-post-icon"
                >

                <div class="user-profile-post-main">

                    <div class="user-profile-post-header">

                        <p class="user-profile-post-name">
                            {{ $target->username }}
                        </p>

                        <p class="user-profile-post-date">
                            {{ $post->created_at->format('Y-m-d H:i') }}
                        </p>

                    </div>

                    <p class="user-profile-post-text">
                        {{ $post->post }}
                    </p>

                </div>

            </div>

        @empty

            <p class="user-profile-no-post">
                投稿はまだありません。
            </p>

        @endforelse

    </div>

</div>

@endsection
