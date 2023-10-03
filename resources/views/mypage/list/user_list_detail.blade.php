<!-- ペットオーナーユーザと管理ユーザの会員情報 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/css/component.css">
    <link rel="stylesheet" href="./../assets/css/member.css">
    <title>AHsearch会員情報</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>

    <h1>会員情報</h1>

    <div class="p-wrap">
        <p>氏名：{{ $user->name }}<br>
        フリガナ：{{ $user->kana }}<br>
        電話番号：{{ $user->tel }}<br>
        メールアドレス：{{ $user->email }}<br>
        パスワード：＊＊＊＊＊＊＊＊＊＊＊＊</p>
    </div>

    <div class="btns">
        <a href="{{ route('user_list') }}"><button class="back">戻る</button></a>
        <a href="{{ route('member_change',$user->id) }}"><button class="send">変更する</button></a>
    </div>

    @if($user->role===0)
    <div class="mypets">
    <a href="{{ route('list_myPets',$user->id) }}"><button class="send">うちの子カルテ</button></a>
    </div>
    @endif


    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>