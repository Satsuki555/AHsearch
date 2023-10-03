<!-- パスワードリセット -->

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

    <h1>パスワードをお忘れ<br>の方へ</h1>
    
    <div class="p-wrap">
        <div class="p">
            <p>登録しているメールアドレスを入力してください。<br>
            パスワードリセットフォームをお送りします。</p>
        </div>
    </div>

    <form action="{{ route('mail_send') }}" method="post">
    @csrf

        @if($errors -> has('email'))
            <div class="err">
                {{ $errors -> first('email')}}
            </div>
        @endif
        <input type="text" name="email" id="email" placeholder="メールアドレス" value="{{ old('email') }}">

        <div class="btns">
            <button type="submit" class="send">送信</button>
            <button class="back" type="button" onClick="history.back()">戻る</button>
        </div>
    </form>

    </main>

    @include('/compornents.footer') 

</body>
</html>