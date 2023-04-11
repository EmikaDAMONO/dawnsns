@extends('layouts.login')

@section('content')

  <div class='container'>

   <div class="post-wrap">
       <p class="img-icon">
        <img src="/images/icons/<?php
       $myImage = Auth::user()->images;
        echo "$myImage";
        ?>">
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
            <?php
            $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id as posts_id', 'posts.created_at as posts_created', 'posts.updated_at as posts_updated', 'users.username', 'posts.post', 'users.images', 'posts.user_id')
            ->latest('posts_created')
            ->get();
            ?>

        @foreach ($posts as $post)<!--繰り返し開始-->
<!--ここから自分の投稿表示-->
        <?php
            $whoPosted = $post->user_id;
            $id = Auth::user()->id;

    if ($whoPosted == $id) {
        echo <<< EOM
       <div class="postings">
       EOM;
       echo <<< EOM
        <div class="post-table">
          <p class="p-u-image"><img src="/images/icons/
EOM;
echo "$post->images";
echo <<< EOM
          "></p>
          <p class="p-user-name">
EOM;
echo "$post->username";
echo <<< EOM
          </p>
          <p class="p-c-time">
EOM;
echo "$post->posts_created";
echo <<< EOM
          </p>
          <p class="p-text">
EOM;
$postMyText = nl2br(htmlspecialchars($post->post));
echo "$postMyText";
echo <<< EOM
          </p>
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
EOM;
$editOpen = Form::open(['url' => '/post/update']);
$editHidden = Form::hidden('id', $post->posts_id);
$editText = Form::textarea('upPost', $post->post, ['required', 'class' => 'edit-form-control']);
echo "$editOpen";
echo "$editHidden";
echo "$editText";
echo <<< EOM
<button type="submit" class="btn-primary pullRight modal-end">
<img src="images/edit.png">
</button>
EOM;
$editClose = Form::close();
echo "$editClose";

echo <<< EOM
		</div>
	</div>
</div>

          <p class="p-del">
          <a class="btn-danger" href="/post/
EOM;
echo "$post->posts_id";
echo <<< EOM
          /delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
          </a>
          </p>
        </div>
        </div>
        EOM;
    }
        ?>
<!--ここまで自分の投稿表示-->
<!--ここからフォローしてる人の投稿表示-->
        <?php
            $following = DB::table('follows')
                    ->where('follower_id',$id)
                    ->first();
    if ($whoPosted == $following) {
        echo <<< EOM
       <div class="postings">
       EOM;
       echo <<< EOM
        <div class="post-table">
          <p class="p-u-image"><img src="/images/icons/
EOM;
echo "$post->images";
echo <<< EOM
          "></p>
          <p class="p-user-name">
EOM;
echo "$post->username";
echo <<< EOM
          </p>
          <p class="p-c-time">
EOM;
echo "$post->posts_created";
echo <<< EOM
          </p>
          <p class="p-text">
EOM;
$postMyText = nl2br(htmlspecialchars($post->post));
echo "$postMyText";
echo <<< EOM
          </p>
        </div>
        </div>
        EOM;
    }
        ?>




      @endforeach<!--繰り返しおしまい-->

    </div>

  </div>

@endsection
