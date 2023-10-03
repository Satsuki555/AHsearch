<!-- お問い合わせ入力画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/contact.css">
    <title>お問い合わせ</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>
        <h1>お問い合わせ</h1>

        <form action="{{ route('c_confirm') }}" method="POST">
        @csrf

            <label for="name">氏名または病院名を入力してください。</label>
            @if($errors -> has('name'))
                <div class="err">
                    {{ $errors -> first('name')}}
                </div>
            @endif
            <input type="text" name="name" id="name" value="{{ old('name') }}">

            <label for="email">メールアドレスを入力してください。</label>
            @if($errors -> has('email'))
                <div class="err">
                    {{ $errors -> first('email') }}
                </div>
            @endif
            <input type="text" name="email" id="email" value="{{ old('email') }}">

            <label for="body">お問い合わせ内容を入力してください。</label>
            @if($errors -> has('body'))
                <div class="err">
                    {{ $errors -> first('body') }}
                </div>
            @endif
            <textarea name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>

            <button type="submit" name="confirm">確認</button>
        </form>
    </main>

    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>