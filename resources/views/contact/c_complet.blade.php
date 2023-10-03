<!-- お問い合わせ完了画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/contact.css">
    <title>お問い合わせ</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>
        <h1>送信完了</h1>

        <div class="complet-p">
        <p>お問い合わせを送信しました。</p>
        </div>
        
    </main>

    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>