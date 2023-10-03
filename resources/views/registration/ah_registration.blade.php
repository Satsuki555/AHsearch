<!-- 動物病院新規会員登録 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/registration.css">
    <title>AHsearch動物病院新規会員登録</title>
</head>
<body>
    @include('/compornents.header')

    <div class="btns">
        <a href="{{ route('top') }}"><button class="back">戻る</button></a>
    </div>

    <h1>動物病院会員<br>新規登録</h1>

    <form action="{{ route('ah_user_confirm') }}" method="post">
        @csrf

        <label for="ah-name">病院名を入力してください。</label>
        @if($errors -> has('ah-name'))
            <div class="err">
                {{ $errors -> first('ah-name')}}
            </div>
        @endif
        <input type="text" name="ah-name" id="ah-name" placeholder="病院名" value="{{ old('ah-name') }}">

        <label for="kana">フリガナを入力してください。</label>
        @if($errors -> has('kana'))
            <div class="err">
                {{ $errors -> first('kana')}}
            </div>
        @endif
        <input type="text" name="kana" id="kana" placeholder="フリガナ" value="{{ old('kana') }}">

        <label for="tel">電話番号を入力してください。</label>
        @if($errors -> has('tel'))
            <div class="err">
                {{ $errors -> first('tel')}}
            </div>
        @endif
        <input type="text" name="tel" id="tel" placeholder="電話番号" value="{{ old('tel') }}">

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
                {{ $errors -> first('password')}}
            </div>
        @endif
        <input type="password" name="password" id="password" placeholder="パスワード" value="{{ old('password') }}">

        <label for="password_confirmation">確認用パスワードを入力してください。</label>
        @if($errors -> has('password_confirmation'))
            <div class="err">
                {{ $errors -> first('password_confirmation')}}
            </div>
        @endif
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="確認用パスワード" value="{{ old('password_confirmation') }}">

        <input type="hidden" name="role" id="po_role" value="1">

        <button type="submit" class="button">確認</button>

    </form>
    @include('/compornents.footer')    
</body>
</html>