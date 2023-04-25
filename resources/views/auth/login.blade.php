@extends('layouts.logout')

@section('content')
  <p class="entrance-title ">Social Network Service</p>
  <div class="entrance-box">
        <p class="e-form-item">DAWNのSNSへようこそ</p>
    <div class="e-form-box">
      {!! Form::open() !!}
      <p class="e-form-type">
      MailAddress
      </p>
      <p class="e-form">
      {{ Form::text('mail',null,['class' => 'input']) }}
      </p>
      <p class="e-form-type">
      Password
      </p>
      <p class="e-form">
      {{ Form::password('password',['class' => 'input']) }}
      </p>
    </div>
    <p class="e-form-button">
      <button type="submit" class="e-btn">
        LOGIN
      </button>
    </p>
    {!! Form::close() !!}
    <p><a href="/register">新規ユーザーの方はこちら</a></p>
  </div>





@endsection
