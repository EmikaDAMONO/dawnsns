@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="entrance-box">
    <p class="added-name">{{$added_name}}さん</p>
    <p class="youkoso">ようこそ！DAWNSNSへ！</p>
    <div class="e-form-box">
      <p class="e-form-type">ユーザー登録が完了しました。</p>
      <p class="e-form-type">さっそく、ログインをしてみましょう。</p>
    </div>
    <?php
    session()->flush();
    ?>
    <p class="back-button">
      <button onclick="location.href='/login'" class="e-btn">
    </p>

    ログイン画面へ
  </button>
  </div>

</div>

@endsection
