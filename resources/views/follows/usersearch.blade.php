@extends('layouts.login')

@section('content')
<div class="container">

        {!! Form::open(['url' => 'follow/search']) !!}
            {!! Form::input('text','userSearch', null, ['required', 'class' => 'search-form', 'placeholder' => 'ユーザー検索']) !!}
           <button type="submit" class="btn">
            検索
          </button>
         {!! Form::close() !!}

</div>
        @foreach($searchingUsers as $searchingUser)<!--繰り返し開始-->
<p>
  <img src="/images/icons/{{ $searchingUser->images }}">
</p>

        @endforeach<!--繰り返しおしまい-->

@endsection
