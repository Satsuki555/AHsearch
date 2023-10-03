<!-- パスワード再設定画面 -->

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

    <h1>パスワード再設定</h1>
    
    <div class="p-wrap">
        <div class="p">
            <p>新しいパスワードを入力してください。</p>
        </div>
    </div>

    <form method="POST" action="{{ route('pass_update') }}">
        @csrf
        <input type="hidden" name="reset_token" value="{{ $userToken->token }}">
        <div class="input-group">
            <label for="password" class="label">パスワード</label>
            <input type="password" name="password" class="input {{ $errors->has('password') ? 'incorrect' : '' }}">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
            @error('token')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group">
            <label for="password_confirmation" class="label">パスワードを再入力</label>
            <input type="password" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? 'incorrect' : '' }}">
        </div>
        <button type="submit">パスワードを再設定</button>
    </form>

    </main>

    @include('/compornents.footer') 

</body>
</html>