@extends('layouts.app')

@section('content')

<div class="connection-list-page">

    <h1 class="connection-list-title">
        フォローリスト
    </h1>

    {{-- フォローしているユーザーのアイコン一覧 --}}
    <div class="connection-user-icons">

        @forelse ($followings as $follow)

            @if ($follow->followedUser)
                <a
                    href="{{ url('/user/profile/' . $follow->followedUser->id) }}"
                    class="connection-user-link"
                >
                    <img
                        src="{{ $follow->followedUser->icon_image_url }}"
                        alt="{{ $follow->followedUser->username }}のアイコン"
                        class="connection-user-icon"
                    >
                </a>
            @endif

        @empty

            <p class="connection-empty-message">
                フォローしているユーザーはいません。
            </p>

        @endforelse

        </div>

     {{-- フォローしているユーザーの投稿 --}}
        <div class="connection-post-list">

        @foreach ($posts as $post)

        <div class="connection-post-box">

            <a
                href="{{ url('/user/profile/' . $post->user->id) }}"
                class="connection-post-user"
            >
                <img
                    src="{{ $post->user->icon_image_url }}"
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
