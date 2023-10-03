<!-- ペットオーナーと管理ユーザ会員情報変更確認画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/member.css">
    <title>AHsearch会員情報変更</title>
</head>
<body>
    @include('/compornents.login_header')

    <main class="main">
        <h1>確認</h1>

        <div class=complet-p>
        <p>会員情報を変更しました。</p>
        </div>

        <div class="btns">
        <a href="{{ route('mypage') }}"><button class="send">マイページへ戻る</button></a>
        </div>        

        
    </main>

    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div> 
</body>
</html>