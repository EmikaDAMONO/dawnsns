@extends('layouts.login')

@section('content')

<div class='container'>


    	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif


  <div class="my-profile-box">
    <p class="prof-icon-img">
      <img src="/images/icons/{{ $my_type->images }}">
    </p>
    <div class="prof-forms">
      {!! Form::open(['url' => '/update_prof','files' => true]) !!}
      <div class="type-name-wrap">
        <p class="p-content">UserName</p>
        <p>
          {{ Form::text('profile-username',$my_type->username,['class' => 'input']) }}
        </p>
      </div>
      <div class="type-name-wrap">
        <p class="p-content">MailAddress</p>
        <p>
          {{ Form::text('profile-mail',$my_type->mail,['class' => 'input']) }}
        </p>
      </div>

      <div class="type-name-wrap">
        <p class="p-content">Password</p>
        <p>
          {{ Form::password('disabled',['placeholder' => $dot, 'class' => 'now-pass']) }}
        </p>
      </div>

      <div class="type-name-wrap">
        <p class="p-content">new Password</p>
        <p>
          {{ Form::password('profile-new-password',['class' => 'input']) }}
        </p>
      </div>

      <div class="type-bio-wrap">
        <p class="p-content">Bio</p>
        <p>{{ Form::textarea('profile-bio',$my_type->bio,['class' => 'input-bio']) }}</p>
      </div>

      <div class="type-name-wrap">
        <p class="p-content">Icon Image</p>
        <div class="icon-up">
            <input type="file" name="icon-image" class="imgbtn">
        </div>
      </div>
      <button type="submit" class="btn-p-up">
        更新
      </button>
    {!! Form::close() !!}
</div>
  </div>

</div>


@endsection
