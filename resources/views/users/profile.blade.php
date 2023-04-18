@extends('layouts.login')

@section('content')

<div class='container'>
  <div class="my-profile-box">
      <p class="prof-icon-img">
        <img src="/images/icons/{{ $my_type->images }}">
      </p>
    <div class="type-name-wrap">
      <p>UserName</p>
      <p>{{ $my_type->username }}</p>
    </div>

    <div class="type-name-wrap">
      <p>MailAdress</p>
      <p>
        {{ Form::text('mail',$my_type->mail,['class' => 'input']) }}
      </p>
    </div>

    <div class="type-name-wrap">
      <p>Password</p>
      <p>
        {{ Form::password('disabled',['placeholder' => $dot]) }}
      </p>
    </div>

    <div class="type-name-wrap">
      <p>new Password</p>
      <p>
        {{ Form::password('password',['class' => 'input']) }}
      </p>
    </div>

    <div class="type-name-wrap">
      <p>Bio</p>
      <p>{{ Form::text('bio',$my_type->bio,['class' => 'input']) }}</p>
    </div>

    <div class="type-name-wrap">
      <p>Icon Image</p>
      <div class="icon-up">
        <form method="POST" action="/upload" enctype="multipart/form-data">
          @csrf
          <label>
          <input type="file" name="image">ファイルを選択
          </label>
        </form>
      </div>
    </div>
{{ Form::submit('登録') }}


  </div>
</div>


@endsection
