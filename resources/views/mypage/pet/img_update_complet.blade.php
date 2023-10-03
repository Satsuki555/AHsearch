<!-- 画像追加完了 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/css/component.css">
    <link rel="stylesheet" href="./../assets/css/pet_confirm.css">
    <title>AHsearchうちの子カルテ</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>
        <h1>登録完了</h1>

        <div class="complet-p">
        <p>写真のアップロードを完了しました。</p>
        </div>

        <div class="complet-btn">
        <a href="{{ route('myPets') }}"><button>うちの子カルテへ戻る</button></a>
        </div>

    </main>

    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login')
    </div>
</body>
</html>