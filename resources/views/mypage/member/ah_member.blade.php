<!-- ログインしている動物病院ユーザの会員情報 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/member.css">
    <title>AHsearchマイページ</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>

    <h1>会員情報</h1>

    <div class="p-wrap">
        <p>病院名：{{ $user->name }}<br>
        フリガナ：{{ $user->kana }}<br>
        電話番号：{{ $user->tel }}<br>
        メールアドレス：{{ $user->email }}<br>
        パスワード：＊＊＊＊＊＊＊＊＊＊＊＊</p>
    </div>

    <div class="btns">
        <button class="back" type="button" onClick="history.back()">戻る</button>
        <a href="{{ route('ah_member_change',$user->id) }}"><button class="send">変更する</button></a>
    </div>


    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>