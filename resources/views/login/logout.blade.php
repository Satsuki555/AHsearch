<!-- ログアウト画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/logout.css">
    <title>AHsearch検索</title>
</head>
<body>
    @include('/compornents.header')
    @yield('h-login')

    <main>
        <h1>ログアウトしますか？</h1>

        <form action="{{ route('logout') }}" method="post">
            @csrf

            <div class="btns">
                <button class="back" type="button" onClick="history.back()">戻る</button>
                <button class="logout">ログアウト</button>
            </div>
        </form>
    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>