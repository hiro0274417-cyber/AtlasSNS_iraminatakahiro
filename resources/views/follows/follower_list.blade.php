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
                        src="{{ $follower->followingUser->icon_image_url }}"
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

    {{-- フォロワーの投稿 --}}
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
                </a>

                <div class="connection-post-main">

                    <span class="connection-post-username">
                        {{ $post->user->username }}
                    </span>

                    <p class="connection-post-text">{{ $post->post }}</p>

                    <p class="connection-post-date">
                         {{ $post->created_at->format('Y-m-d H:i') }}
                    </p>

                 </div>

            </div>

         @endforeach

    </div>

</div>

@endsection
