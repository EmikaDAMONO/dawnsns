@extends('layouts.login')

@section('content')

  <div class='container'>

   <div class="post-wrap">
       <p class="img-icon">
        <img src="/images/icons/{{ Auth::user()->images }}">
        </p>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::textarea('newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか・・・？']) !!}
           <button type="submit" class="btn btn-success bp">
            <img src="/images/post.png">
          </button>
         {!! Form::close() !!}
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
        <div class="post-edit">
          <p class="p-update">
          <button type="button" class="btn-primary" data-toggle="modal" data-target="#editModal">
            <img src="images/edit.png">
          </button>
          </p>
          <div class="modal-main js-modal" id="editModal" tabindex="-1">
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
      </div>
      @endforeach<!--繰り返しおしまい-->
    </div>
  </div>
@endsection
