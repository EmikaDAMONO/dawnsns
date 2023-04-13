@extends('layouts.login')

@section('content')
<div class="container">

  <div class="search-wrap">
    {!! Form::open(['url' => '/now-searching']) !!}
    {!! Form::input('text','user_search', null, ['required', 'class' => 'search-form', 'placeholder' => 'ユーザー名']) !!}
    <button type="submit" class="btn search-b">
    <img src="/images/search.png">
    </button>
    {!! Form::close() !!}
  </div>

        @foreach($findingUsers as $findingUser)<!--繰り返し開始-->
    <div class="find-user-wrap">
      <p class="img-icon">
        <img src="/images/icons/{{ $findingUser->images }}">
      </p>
      <p class="f-username">{{ $findingUser->username }}</p>
    </div>

        @endforeach<!--繰り返しおしまい-->
</div>
@endsection
