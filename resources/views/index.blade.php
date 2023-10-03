<!-- ログイン前トップ画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title>AHsearch</title>
</head>
<body>
    @include('/compornents.header')

    @if(session('logout'))
        <div class="logout">
            {{ session('logout') }}
        </div>
    @endif

    <div class="login-wrap">
        <h1>ログイン</h1>
        <a href="{{ route('po_login') }}"><button>ペットオーナー様は<br>こちら>>></button></a>
        <a href="{{ route('ah_login') }}"><button>動物病院スタッフ様は<br>こちら>>></button></a>
    </div>
    <div class="new-wrap">
        <h1>新規会員登録</h1>
        <a href="{{ route('po_registration') }}"><button>ペットオーナー様は<br>こちら>>></button></a>
        <a href="{{ route('ah_registration') }}"><button>動物病院スタッフ様は<br>こちら>>></button></a>
    </div>

    @include('/compornents.footer')
</body>
</html>