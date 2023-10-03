<!-- パスワードリセットメール送信完了 -->

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

    <h1>メール送信完了</h1>
    
    <div class="p-wrap">
        <div class="send-p">
            <p>パスワード再設定用のメールを送信しました。<br>
            メールに記載されているリンクからパスワードの再設定を行ってください。</p>
        </div>
    </div>

        <div class="btn">
            <a href="{{ route('po_login') }}"><button class="send">ログイン画面へ</button></a>
        </div>
    </main>

    @include('/compornents.footer') 

</body>
</html>