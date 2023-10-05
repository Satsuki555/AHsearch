<!-- ペットオーナーと管理ユーザ会員情報変更確認画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/registration.css">
    <title>AHsearch会員情報変更</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>
        <h1>確認</h1>

        <div class=confirm-p>
        <p>変更内容に間違いがないか確認してください。<br>
        間違いがなければ送信してください。</p>
        </div>

        <form action="{{ route('member_complet') }}" method="POST">
        @csrf

            <input type="hidden" name="id" value="{{ $member['id'] }}">

            <div class="conf-wrap">
                <label for="name">氏名：</label>
                <div class="conf">
                    {{ $member['name'] }}
                </div>
                <input type="hidden" name="name"
                value="{{ $member['name'] }}">
            </div>

            <div class="conf-wrap">
                <label for="kana">フリガナ：</label>
                <div class="conf">
                    {{ $member['kana'] }}
                </div>
                <input type="hidden" name="kana"
                value="{{ $member['kana'] }}">
            </div>

            <div class="conf-wrap">
                <label for="tel">電話番号：</label>
                <div class="conf">
                    {{ $member['tel'] }}
                </div>
                <input type="hidden" name="tel"
                value="{{ $member['tel'] }}">
            </div>

            <div class="conf-wrap">
                <label for="email">メールアドレス：</label>
                <div class="conf">
                    {{ $member['email'] }}
                </div>
                <input type="hidden" name="email"
                value="{{ $member['email'] }}">
            </div>

            <div class="btns">
            <button type="submit" name="action" value="submit" class="send-button">変更</button>
            <button type="submit" name="action" value="back" class="back-button">戻る</button>
            </div>

        </form>

        
    </main>

    <div class="footer">
    @include('/compornents.footer')
    </div>
</body>
</html>