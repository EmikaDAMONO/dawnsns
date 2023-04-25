@extends('layouts.logout')

@section('content')


	<div class="entrance-box">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<p class="e-form-item">新規ユーザー登録</p>

		<div class="e-form-box">
			{!! Form::open() !!}

			<p class="e-form-type">
				UserName
			</p>
			<p class="e-form">
				{{ Form::text('username',null,['class' => 'input']) }}
			</p>
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
				{{ Form::password('password',null,['class' => 'input']) }}
			</p>
			<p class="e-form-type">
				Password confirm
			</p>
			<p class="e-form">
				{{ Form::password('password_confirmation',null,['class' => 'input']) }}
			</p>
		</div>
	  <p class="new-form-button">
			<button type="submit" class="e-btn">
				REGISTER
			</button>
		</p>
		{!! Form::close() !!}
		<p><a href="/login">ログイン画面へ戻る</a></p>
	</div>
@endsection
