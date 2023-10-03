<!-- うちの子カルテ新規登録確認画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/pet_confirm.css">
    <title>AHsearchうちの子カルテ</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>
        <h1>確認</h1>

        <div class=confirm-p>
        <p>登録内容に間違いがないか確認してください。<br>
        間違いがなければ送信してください。</p>
        </div>

        <form action="{{ route('myPet_complet') }}" method="POST">
        @csrf

            <div class="conf-wrap">
                <label for="name">名前：</label>
                <div class="conf">
                    {{ $pet['name'] }}
                </div>
                <input type="hidden" name="name"
                value="{{ $pet['name'] }}">
            </div>

            <div class="conf-wrap">
                <label for="animal">動物種：</label>
                <div class="conf">
                    {{ $pet['animal'] }}
                </div>
                <input type="hidden" name="animal"
                value="{{ $pet['animal'] }}">
            </div>

            <div class="conf-wrap">
                <label for="breed">品種：</label>
                <div class="conf">
                    {{ $pet['breed'] }}
                </div>
                <input type="hidden" name="breed"
                value="{{ $pet['breed'] }}">
            </div>

            <div class="conf-wrap">
                <label for="birth">生年月日：</label>
                <div class="conf">
                    {{ $pet['birth'] }}
                </div>
                <input type="hidden" name="birth"
                value="{{ $pet['birth'] }}">
            </div>

            <div class="conf-wrap">
                <label for="sex">性別：</label>
                <div class="conf">
                    {{ $pet['sex'] }}
                </div>
                <input type="hidden" name="sex"
                value="{{ $pet['sex'] }}">
            </div>

            <div class="conf-wrap">
                <label for="rv_day">狂犬病ワクチン接種日：</label>
                <div class="conf">
                    {{ $pet['rv_day'] }}
                </div>
                <input type="hidden" name="rv_day"
                value="{{ $pet['rv_day'] }}">
            </div>

            <div class="conf-wrap">
                <label for="vac_day">混合ワクチン接種日：</label>
                <div class="conf">
                    {{ $pet['vac_day'] }}
                </div>
                <input type="hidden" name="vac_day"
                value="{{ $pet['vac_day'] }}">
            </div>

            <input type="hidden" name="user_id" id="user_id" value="{{ $pet['user_id'] }}">

            <button type="submit" name="action" value="back" class="button">戻る</button>
            <button type="submit" name="action" value="submit" class="button">送信</button>

        </form>

        
    </main>

    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>