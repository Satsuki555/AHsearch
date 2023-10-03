<!-- 動物病院ログイン -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>AHsearch動物病院ログイン</title>
</head>
<body>
    @include('/compornents.header')

    <main>

    <div class="btns">
        <a href="{{ route('top') }}"><button class="back">戻る</button></a>
    </div>

    <h1>動物病院会員<br>ログイン</h1>

    <form action="{{ route('ah-login') }}" method="post">
        @csrf

        @if(session('login_error'))
            <div class="alert-error">
                {{ session('login_error') }}
            </div>
        @endif

        <label for="email">メールアドレスを入力してください。</label>
        @if($errors -> has('email'))
                <div class="err">
                    {{ $errors -> first('email')}}
                </div>
        @endif
        <input type="text" name="email" id="email" placeholder="メールアドレス" value="{{ old('email') }}">

        <label for="password">パスワードを入力してください。</label>
        @if($errors -> has('password'))
                <div class="err">
                    {{ $errors -> first('password') }}
                </div>
        @endif
        <input type="password" name="password" id="password" placeholder="パスワード">

        <button type="submit" class="button">ログイン</button>
    </form>

    <div class="pass-reset">
        <a href="">パスワードをお忘れの方はこちら>>></a>
    </div>
    
    </main>

    @include('/compornents.footer')
</body>
</html>