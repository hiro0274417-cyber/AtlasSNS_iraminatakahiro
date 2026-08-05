@extends('layouts.app')
@section('content')

<h1>フォローリスト</h1>

@foreach($followings as $follow)
<div class="follow-user-box">

    <a href="/user/profile/{{ $follow->followedUser->id }}">
        <img src="{{ $follow->followedUser->images }}" class="follow-user-icon">
    </a>

    <p class="follow-username">{{ $follow->followedUser->username }}</p>

    @foreach($follow->followedUser->posts as $post)
        <div class="follow-post-box">
            <p class="follow-post-text">{{ $post->post }}</p>
            <p class="follow-post-date">{{ $post->created_at }}</p>
        </div>
    @endforeach

</div>
@endforeach

@endsection
