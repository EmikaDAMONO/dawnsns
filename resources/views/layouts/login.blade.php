<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="./js/script.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
         <h1 class="top-logo"><a href="/top"><img src="/images/main_logo.png"></a></h1>
            <div id="top-menu">

                    <div id="menu-name">
                        <p class="menu-name-btn">
                            <?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user()->username;
echo "$user";
?>
                            さん
                        </p>
                        <div class="menu-trigger">
                        <span class="menu-v1"></span>
                        <span class="menu-v2"></span>
                        </div>
                        <p>
                            <img src="/images/icons/<?php
$image = Auth::user()->images;
echo "$image";
?>"></p>
                    </div>

                <div class="g-navi">
                 <ul>
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                 </ul>
                </div>
            </div>
        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="login-name-follow">
                    <?php
                    echo "$user";
                    ?>
                    さんの</p>
                <div class="f-count">
                <p>フォロー数</p>
                <p>
                    <?php
                    use Illuminate\Support\Facades\DB;
                    $id = Auth::user()->id;
                    $follow = DB::table('follows')
                    ->where('follower_id',$id)
                    ->count();
                    echo "$follow";
                    ?>
名</p>
                </div>
<button type="button" class="btn bf">
<a href="follow-list">フォローリスト</a>
</button>

                <div class="f-count">
                <p>フォロワー数</p>
                <p>
                                        <?php
                    $follower = DB::table('follows')
                    ->where('follow_id',$id)
                    ->count();
                    echo "$follower";
                    ?>
                    名</p>
                </div>
                 <button type="button" class="btn bf">
                    <a href="/follower-list">フォロワーリスト</a>
                </button>
            </div>
            <div class="user-search">
<button type="button" class="btn bs">
<a href="/user-search">ユーザー検索</a>
</button>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
