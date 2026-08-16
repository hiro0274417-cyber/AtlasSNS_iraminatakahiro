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
   <section class="user-profile-header">

    <img
        src="{{ $target->icon_image_url }}"
        alt="{{ $target->username }}のアイコン"
        class="user-profile-icon"
    >

    <div class="user-profile-information">

        <div class="user-profile-row">
            <span class="user-profile-label">ユーザー名</span>
            <span class="user-profile-value">{{ $target->username }}</span>
        </div>

        <div class="user-profile-row">
            <span class="user-profile-label">自己紹介</span>
            <span class="user-profile-value">
                {{ $target->bio ?: '' }}
            </span>
        </div>

    </div>

    <div class="user-profile-action">

        @if ($isOwnProfile)

            <a
                href="{{ url('/profile/edit') }}"
                class="profile-edit-link"
            >
                プロフィール編集
            </a>

        @elseif ($isFollow)

            <form
                action="{{ url('/unfollow/' . $target->id) }}"
                method="POST"
            >
                @csrf

                <button type="submit" class="unfollow-button">
                    フォロー解除
                </button>
            </form>

        @else

            <form
                action="{{ url('/follow/' . $target->id) }}"
                method="POST"
            >
                @csrf

                <button type="submit" class="follow-button">
                    フォローする
                </button>
            </form>

        @endif

    </div>

</section>

    {{-- 投稿一覧 --}}
    <section class="user-profile-posts">



        @forelse ($target->posts as $post)

            <div class="user-profile-post-box">

                <img
                    src="{{ $target->icon_image_url }}"
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

    </section>

</div>

@endsection
