<!-- ペットオーナー新規会員登録確認画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/registration.css">
    <title>AHsearchペットオーナ新規登録確認画面</title>
</head>
<body>
    @include('/compornents.header')

    <main>
        <h1>確認</h1>

        <div class=confirm-p>
        <p>登録内容に間違いがないか確認してください。<br>
        間違いがなければ送信してください。</p>
        </div>

        <form action="{{ route('po_complet') }}" method="POST">
        @csrf

            <div class="conf-wrap">
                <label for="name">氏名：</label>
                <div class="conf">
                    {{ $registration['name'] }}
                </div>
                <input type="hidden" name="name"
                value="{{ $registration['name'] }}">
            </div>

            <div class="conf-wrap">
                <label for="kana">フリガナ：</label>
                <div class="conf">
                    {{ $registration['kana'] }}
                </div>
                <input type="hidden" name="kana"
                value="{{ $registration['kana'] }}">
            </div>

            <div class="conf-wrap">
                <label for="tel">電話番号：</label>
                <div class="conf">
                    {{ $registration['tel'] }}
                </div>
                <input type="hidden" name="tel"
                value="{{ $registration['tel'] }}">
            </div>

            <div class="conf-wrap">
                <label for="email">メールアドレス：</label>
                <div class="conf">
                    {{ $registration['email'] }}
                </div>
                <input type="hidden" name="email"
                value="{{ $registration['email'] }}">
            </div>

            <div class="conf-wrap">
                <label for="password">パスワード：</label>
                <div class="conf">
                    ********
                </div>
                <input type="hidden" name="password"
                value="{{ $registration['password'] }}">
            </div>

            <input type="hidden" name="role" id="po_role" value="{{ $registration['role'] }}">

            <button type="submit" name="action" value="back" class="back-btn">戻る</button>
            <button type="submit" name="action" value="submit" class="button">送信</button>

        </form>

        
    </main>

    <div class="footer">
    @include('/compornents.footer')
    </div>
</body>
</html>