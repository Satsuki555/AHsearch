<!-- お問い合わせ確認画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/contact.css">
    <title>お問い合わせ</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>
        <h1>確認</h1>

        <div class=confirm-p>
        <p>お問い合わせ内容に間違いがないか確認してください。<br>
        間違いがなければ送信してください。</p>
        </div>

        <form action="{{ route('c_complet') }}" method="POST">
        @csrf

            <div class="conf-wrap">
                <label for="name">名前：</label>
                <div class="conf">
                    {{ $contact['name'] }}
                </div>
                <input type="hidden" name="name"
                value="{{ $contact['name'] }}">
            </div>

            <div class="conf-wrap">
                <label for="email">メールアドレス：</label>
                <div class="conf">
                    {{ $contact['email'] }}
                </div>
                <input type="hidden" name="email"
                value="{{ $contact['email'] }}">
            </div>

            <div class="conf-wrap">
                <label for="body">お問い合わせ内容：</label>
                <div class="conf">
                    {!! nl2br(e($contact['body'])) !!}
                </div>
                <input type="hidden" name="body"
                value="{{ $contact['body'] }}">
            </div>

            <button type="submit" name="action" value="back">戻る</button>
            <button type="submit" name="action" value="submit">送信</button>

        </form>

        
    </main>

    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>