@extends('layouts.login')

@section('content')
  <div class='container'>
<div class="contents-wrap">

<h2 class="list-name">Follower list</h2>

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
