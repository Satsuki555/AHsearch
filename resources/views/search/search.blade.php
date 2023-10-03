<!-- 病院検索画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/search.css">
    <title>AHsearch検索</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>
        @if(session('login_success'))
            <div class="alert-login">
                {{ session('login_success') }}
            </div>
        @endif
    <form action="{{ route('find_ah') }}" method="post">
        @csrf

        <label for="city">お住いの市区町村を入力してください。</label>
        <input type="text" name="city" id="city">

        <!-- <label for="time">受診したい時間を選択してください。</label>
        <input type="text" name="time" id="time"> -->

        <button type="submit">検索</button>
    </form>

    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>