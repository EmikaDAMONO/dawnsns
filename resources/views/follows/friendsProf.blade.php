@extends('layouts.login')

@section('content')
<div class="container">
  <div class="contents-wrap">

    <div class="prof-box">
      <p class="f-icon-img">
      <img src="/images/icons/{{ $friend_report->images }}">
      </p>
      <p class="prof-t">Name</p>
      <p class="friends-name">{{$friend_report->username}}</p>
    </div>
    <div class="bio-box">
      <p class="prof-t">Bio</p>
      <p class="friends-bio">
        {{ $friend_report->bio }}
      </p>
    </div>
@if ($my_follow_users->contains($friend_report->id))
        <p>
          {{ Form::open(['url' => '/removing']) }}
          {{ Form::hidden('followerId', $friend_report->id) }}
          <button type="submit" class="p-remove-b">フォローを外す</button>
          {{ Form::close() }}
        </p>
@else
        <p>
          {{ Form::open(['url' => '/following']) }}
          {{ Form::hidden('followId', $friend_report->id) }}
          <button type="submit" class="p-follow-b">フォローする</button>
          {{ Form::close() }}
        </p>
@endif
  </div>
    <div class="post-log">
      @foreach ($posts as $post)<!--繰り返し開始-->
      <div class="postings">
        <div class="post-table">
          <p class="p-u-image"><img src="/images/icons/{{ $post->images }}"></p>
          <p class="p-user-name">{{$post->username}}</p>
          <p class="p-c-time">{{$post->posts_created }}</p>
          <p class="p-text">{{ $post->post }}</p>
        </div>
      </div>
      @endforeach<!--繰り返しおしまい-->
    </div>


</div>
@endsection
