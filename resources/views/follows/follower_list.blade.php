@extends('layouts.app')

@section('content')

<div class="connection-list-page">

    <h1 class="connection-list-title">
        フォロワーリスト
    </h1>

    {{-- フォロワーのアイコン一覧 --}}
    <div class="connection-user-icons">

        @forelse ($followers as $follower)

            @if ($follower->followingUser)
                <a
                    href="{{ url('/user/profile/' . $follower->followingUser->id) }}"
                    class="connection-user-link"
                >
                    <img
                        src="{{ $follower->followingUser->icon_image }}"
                        alt="{{ $follower->followingUser->username }}のアイコン"
                        class="connection-user-icon"
                    >
                </a>
            @endif

        @empty

            <p class="connection-empty-message">
                フォロワーはいません。
            </p>

        @endforelse

    </div>

    {{-- フォロワーの投稿一覧 --}}
    <div class="connection-post-list">

        @foreach ($posts as $post)

        <div class="connection-post-box">

            <a
                href="{{ url('/user/profile/' . $post->user->id) }}"
                class="connection-post-user"
            >
                <img
                    src="{{ $post->user->icon_image }}"
                    alt="{{ $post->user->username }}のアイコン"
                    class="connection-post-icon"
                >

                <span class="connection-post-username">
                    {{ $post->user->username }}
                </span>
            </a>

            <div class="connection-post-main">

                <p class="connection-post-date">
                    {{ $post->created_at->format('Y-m-d H:i') }}
                </p>

                <p class="connection-post-text">
                    {{ $post->post }}
                </p>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection
