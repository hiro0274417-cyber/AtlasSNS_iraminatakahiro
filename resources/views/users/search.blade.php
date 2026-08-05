@extends('layouts.app')

@section('content')

<div class="user-search-page">

    <h1 class="user-search-title">
        ユーザー検索
    </h1>

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
            placeholder="ユーザー名を入力してください"
            class="user-search-input"
        >

        <button type="submit" class="user-search-button">
            検索
        </button>
    </form>

    {{-- 検索した場合のみ検索ワードを表示 --}}
    @if ($keyword !== '')
        <p class="search-keyword">
            検索ワード：{{ $keyword }}
        </p>
    @endif

    {{-- ユーザー一覧 --}}
    <div class="search-user-list">

        @forelse ($users as $user)
            <div class="search-user-box">

                <a
                    href="{{ url('/user/profile/' . $user->id) }}"
                    class="search-user-profile"
                >
                    <img
                        src="{{ $user->images }}"
                        alt="{{ $user->username }}のアイコン"
                        class="search-user-icon"
                    >

                    <span class="search-user-name">
                        {{ $user->username }}
                    </span>
                </a>

            </div>
        @empty
            <p class="search-no-result">
                該当するユーザーはいません。
            </p>
        @endforelse

    </div>

</div>

@endsection
