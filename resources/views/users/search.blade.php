@extends('layouts.app')

@section('content')

<div class="user-search-header">

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

    @if ($keyword !== '')
        <p class="search-keyword">
            検索ワード：{{ $keyword }}
        </p>
    @endif

</div>
    {{-- ユーザー一覧 --}}
    <div class="search-user-list">

        @forelse ($users as $user)

            <div class="search-user-box">

                {{-- ユーザー情報 --}}
                <div class="search-user-profile">

                <a href="{{ url('/user/profile/' . $user->id) }}"
                    class="search-user-icon-link"
                >
                    <img
                        src="{{ $user->icon_image_url }}"
                        alt="{{ $user->username }}のアイコン"
                        class="search-user-icon"
                    >
                </a>

                <span class="search-user-name">
                    {{ $user->username }}
                </span>

            </div>

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


    @endsection
