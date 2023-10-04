<!-- 動物病院新規登録完了画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/registration.css">
    <title>AHsearch動物病院新規登録完了画面</title>
</head>
<body>
    @include('/compornents.header')

    <main>
        <h1>登録完了</h1>

        <div class="complet-p">
        <p>新規会員登録を完了しました。</p>
        </div>

        <div class="complet-btn">
        <a href="{{ route('ah_login') }}"><button class="button">ログインする</button></a>
        </div>

    </main>

    <div class="footer">
    @include('/compornents.footer')
    </div>
</body>
</html>