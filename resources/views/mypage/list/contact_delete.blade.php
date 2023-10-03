<!-- お問い合わせ削除完了画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/css/component.css">
    <link rel="stylesheet" href="./../assets/css/pet_confirm.css">
    <title>AHsearch管理</title>
</head>
<body>
    @include('/compornents.login_header')

    <main class="main">
        <h1>削除完了</h1>

        <div class="complet-p">
        <p>お問い合わせ情報を削除しました。</p>
        </div>

        <div class="complet-btn">
        <a href="{{ route('contact_list') }}"><button>お問い合わせ一覧へ戻る</button></a>
        </div>

    </main>

    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login')
    </div>
</body>
</html>