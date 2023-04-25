@extends('layouts.login')

@section('content')

  <div class='container'>


    <div class="post-log">
      @foreach ($posts as $post)<!--繰り返し開始-->
      <div class="postings">
        <div class="post-table">
          <p class="p-u-image"><img src="/images/icons/{{ $post->images }}"></p>
          <p class="p-user-name">{{$post->username}}</p>
          <p class="p-c-time">{{$post->posts_created }}</p>
          <p class="p-text">{{ $post->post }}</p>
        </div>
        <!--ここから編集・削除ボタン分岐-->
        @if ($post->user_id == $my_id)
        <div class="post-edit">
          <p class="p-update">
          <a href="" class="modalopen btn-primary" data-target="{{$post->posts_id}}">
            <img class="life-img" src="images/edit.png" alt="teatime">
          </a>
          </p>
          <div class="modal-main js-modal" id="{{$post->posts_id}}" tabindex="-1">
            <div class="modal-inner">
              <div class="modal-content">
                {{ Form::open(['url' => '/post/update']) }}
                {{ Form::hidden('id', $post->posts_id) }}
                {{ Form::textarea('upPost', $post->post, ['required', 'class' => 'edit-form-control']) }}
                <button type="submit" class="btn-primary pullRight modal-end">
                <img src="images/edit.png">
                </button>
                {{ Form::close() }}
              </div>
            </div>
          </div>
          <p class="p-del">
            <a class="btn-danger" href="/post/{{ $post->posts_id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
            </a>
          </p>
        </div>
        @endif<!--分岐終了-->
      </div>
      @endforeach<!--繰り返しおしまい-->
    </div>
  </div>
@endsection
