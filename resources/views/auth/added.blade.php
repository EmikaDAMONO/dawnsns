@extends('layouts.logout')

@section('content')

<div id="clear">
<p>
<?php
$added_name = session('added_name');
echo $added_name;
?>
さん、</p>
<p>ようこそ！DAWNSNSへ！</p>
<p>ユーザー登録が完了しました。</p>
<p>さっそく、ログインをしてみましょう。</p>
<?php
session()->flush();
?>
<p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
