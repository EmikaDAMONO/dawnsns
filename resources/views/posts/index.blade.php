@extends('layouts.login')

@section('content')

  <div class='container'>

   <div class="post-wrap">
       <p class="img-icon">
        <img src="/images/<?php
       $myImage = Auth::user()->images;
        echo "$myImage";
        ?>">
        </p>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::textarea('newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか・・・？','rows' => '6']) !!}
           <button type="submit" class="btn btn-success bp">
            <img src="/images/post.png">
          </button>
         {!! Form::close() !!}
        </div>
    </div>

    <div class="post-log">
            <?php
            $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id as posts_id', 'posts.created_at as posts_created', 'posts.updated_at as posts_updated', 'users.username', 'posts.post', 'users.images')
            ->latest('posts_created')
            ->get();
            ?>

        @foreach ($posts as $post)<!--繰り返し開始-->
        <div class="post-table">
        <p class="p-u-image"><img src="/images/{{ $post->images }}"></p>
        <p class="p-user-name">{{ $post->username }}</p>
        <p class="p-text">{!! nl2br(htmlspecialchars($post->post) ) !!}</p>
        <p class="p-c-time">{{ $post->posts_created }}</p>

        </div>
      @endforeach<!--繰り返しおしまい-->

    </div>

  </div>

@endsection
