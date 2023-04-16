@extends('layouts.login')

@section('content')
  <div class='container'>
    <h2 class="list-name">Follower list</h2>
<div class="contents-wrap">

<div class="icons-box">
  @foreach ($icons as $icon)
  <p class="icons">
    {{ Form::open(['url' => '/my_friend']) }}
    {{ Form::hidden('friendsId', $icon->id) }}
    <button type="submit" class="icon-img"><img src="/images/icons/{{ $icon->images }}"></button>
    {{ Form::close() }}
  </p>
  @endforeach
</div>

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
