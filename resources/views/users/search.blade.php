@extends('layouts.app')

@section('content')

<div class="user-search-page">

    <h1 class="user-search-title">
        ユーザー検索
    </h1>

    {{-- 成功メッセージ --}}
    @if (session('success'))
        <p class="success-message">
            {{ session('success') }}
        </p>
    @endif

    {{-- 検索フォーム --}}
    <form
        action="{{ route('users.search') }}"
        method="GET"
        class="user-search-form"
    >
        <input
            type="text"
            name="keyword"
            value="{{ $keyword }}"
            placeholder="ユーザー名"
            class="user-search-input"
        >

        <button type="submit" class="user-search-button">
            <img src="{{ asset('images/search.png') }}" alt="検索">
        </button>
    </form>

    {{-- 検索ワード --}}
    @if ($keyword !== '')
        <p class="search-keyword">
            検索ワード：{{ $keyword }}
        </p>
    @endif

    {{-- ユーザー一覧 --}}
    <div class="search-user-list">

        @forelse ($users as $user)

            <div class="search-user-box">

                {{-- ユーザー情報 --}}
                <a
                    href="{{ url('/user/profile/' . $user->id) }}"
                    class="search-user-profile"
                >
                    <img
                        src="{{ $user->icon_image_url }}"
                        alt="{{ $user->username }}のアイコン"
                        class="search-user-icon"
                    >

                    <span class="search-user-name">
                        {{ $user->username }}
                    </span>
                </a>

                {{-- フォロー操作 --}}
                <div class="search-user-action">

                    @if (in_array($user->id, $followingUserIds))

                        <form
                            action="{{ url('/unfollow/' . $user->id) }}"
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
                            action="{{ url('/follow/' . $user->id) }}"
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

        @empty

            <p class="search-no-result">
                該当するユーザーはいません。
            </p>

        @endforelse

    </div>

</div>

@endsection
