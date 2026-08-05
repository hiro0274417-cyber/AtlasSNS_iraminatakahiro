@extends('layouts.app')
@section('content')

 <h1>ユーザー検索</h1>

 <form action="/search" method="GET">
    <input type="text" name="keyword" placeholder="ユーザー名を検索" value="{{ $keyword ?? '' }}">
    <button type="submit">検索</button>
 </form>

 {{-- 検索結果 --}}
 @if(isset($users))
    <h2>検索結果</h2>

    @foreach($users as $user)
        <div class="search-user-box">
            <a href="/user/profile/{{ $user->id }}">
                {{ $user->username }}
            </a>
        </div>
    @endforeach
 @endif

 @endsection
