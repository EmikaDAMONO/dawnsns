@extends('layouts.login')

@section('content')
<div class="container">

  <div class="search-wrap">
    {!! Form::open(['url' => '/now-searching', 'method' => 'get']) !!}
    {!! Form::input('text','user_search', null, ['required', 'class' => 'search-form', 'placeholder' => 'ユーザー名']) !!}
    <button type="submit" class="btn search-b">
    <img src="/images/search.png">
    </button>
    {!! Form::close() !!}

  </div>

    <div class="contents-main">
        @foreach($findingUsers as $findingUser)<!--繰り返し開始-->
    <div class="find-user-wrap">
      <p class="img-icon">
        <img src="/images/icons/{{ $findingUser->images }}">
      </p>
      <p class="f-username">{{ $findingUser->username }}</p>
@if ($my_follow_users->contains($findingUser->id))
        <p>
          {{ Form::open(['url' => '/removing']) }}
          {{ Form::hidden('followerId', $findingUser->id) }}
          <button type="submit" class="remove-b">フォローを外す</button>
          {{ Form::close() }}
        </p>
@else
        <p>
          {{ Form::open(['url' => '/following']) }}
          {{ Form::hidden('followId', $findingUser->id) }}
          <button type="submit" class="follow-b">フォローする</button>
          {{ Form::close() }}
        </p>
@endif
    </div>
        @endforeach<!--繰り返しおしまい-->
    </div>
</div>
@endsection
