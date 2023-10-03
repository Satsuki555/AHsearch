<!-- パスワードリセット完了画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <title>AHsearchパスワードリセット</title>
</head>
<body>

    @include('/compornents.header')

    <main>

    <h1>パスワード変更完了</h1>
    
    <div class="p-wrap">
        <div class="p">
            <p>パスワードの変更が完了しました。<br>
            新しいパスワードにて再ログインしてください。</p>
        </div>
    </div>

    <div class="login-btn">
        <a href="{{ route('po_login') }}"><button class="send">ログイン画面へ</button></a>
    </div>

    </main>

    @include('/compornents.footer') 

</body>
</html>