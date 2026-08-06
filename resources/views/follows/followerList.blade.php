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
                        src="{{ $follow->followedUser->images }}"
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

        @foreach ($followings as $follow)

            @if ($follow->followedUser)

                @foreach ($follow->followedUser->posts as $post)

                    <div class="connection-post-box">

                        <a
                            href="{{ url('/user/profile/' . $follow->followedUser->id) }}"
                            class="connection-post-user"
                        >
                            <img
                                src="{{ $follow->followedUser->images }}"
                                alt="{{ $follow->followedUser->username }}のアイコン"
                                class="connection-post-icon"
                            >

                            <span class="connection-post-username">
                                {{ $follow->followedUser->username }}
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

            @endif

        @endforeach

    </div>

</div>

@endsection
