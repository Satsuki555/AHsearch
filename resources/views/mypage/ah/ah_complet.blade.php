<!-- 病院情報　新規登録完了画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/pet_confirm.css">
    <title>AHsearch病院情報</title>
</head>
<body>
    @include('/compornents.login_header')

    <main class="main">
        <h1>登録完了</h1>

        <div class="complet-p">
        <p>病院情報の登録を完了しました。</p>
        </div>

        <div class="complet-btn">
        <a href="{{ route('ah') }}"><button>病院情報へ戻る</button></a>
        </div>

    </main>

    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login')
    </div>
</body>
</html>