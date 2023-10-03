<!-- 病院情報　新規登録確認画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/css/component.css">
    <link rel="stylesheet" href="./../assets/css/pet_confirm.css">
    <title>AHsearch病院情報</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>
        <h1>確認</h1>

        <div class=confirm-p>
        <p>登録内容に間違いがないか確認してください。<br>
        間違いがなければ送信してください。</p>
        </div>

        <form action="{{ route('ah_update_complet',$ah['id']) }}" method="POST" >
        @csrf

            <input type="hidden" name="id"
                value="{{ $ah['id'] }}">

                <div class="conf-wrap">
                <label for="name">名前：</label>
                <div class="conf">
                    {{ $ah['name'] }}
                </div>
                <input type="hidden" name="name"
                value="{{ $ah['name'] }}">
            </div>

            <div class="conf-wrap">
                <label for="explanation">病院説明：</label>
                <div class="conf">
                    {{ $ah['explanation'] }}
                </div>
                <input type="hidden" name="explanation"
                value="{{ $ah['explanation'] }}">
            </div>

            <div class="conf-wrap">
                <label for="time">診察時間：</label>
                <div class="conf">
                    {{ $ah['time'] }}
                </div>
                <input type="hidden" name="time"
                value="{{ $ah['time'] }}">
            </div>

            <div class="conf-wrap">
                <label for="animal">診察可能動物：</label>
                <div class="conf">
                    {{ $ah['animal'] }}
                </div>
                <input type="hidden" name="animal"
                value="{{ $ah['animal'] }}">
            </div>

            <div class="conf-wrap">
                <label for="emergency">緊急対応：</label>
                <div class="conf">
                    {{ $ah['emergency'] }}
                </div>
                <input type="hidden" name="emergency"
                value="{{ $ah['emergency'] }}">
            </div>

            <div class="conf-wrap">
                <label for="trimming">トリミング：</label>
                <div class="conf">
                    {{ $ah['trimming'] }}
                </div>
                <input type="hidden" name="trimming"
                value="{{ $ah['trimming'] }}">
            </div>

            <div class="conf-wrap">
                <label for="hotel">ペットホテル：</label>
                <div class="conf">
                    {{ $ah['hotel'] }}
                </div>
                <input type="hidden" name="hotel"
                value="{{ $ah['hotel'] }}">
            </div>

            <div class="conf-wrap">
                <label for="reservation">予約：</label>
                <div class="conf">
                    {{ $ah['reservation'] }}
                </div>
                <input type="hidden" name="reservation"
                value="{{ $ah['reservation'] }}">
            </div>

            <div class="conf-wrap">
                <label for="address">住所：</label>
                <div class="conf">
                    {{ $ah['address'] }}
                </div>
                <input type="hidden" name="address"
                value="{{ $ah['address'] }}">
            </div>

            <div class="conf-wrap">
                <label for="tel">電話番号：</label>
                <div class="conf">
                    {{ $ah['tel'] }}
                </div>
                <input type="hidden" name="tel"
                value="{{ $ah['tel'] }}">
            </div>

            <div class="conf-wrap">
                <label for="parking">駐車場(台)：</label>
                <div class="conf">
                    {{ $ah['parking'] }}
                </div>
                <input type="hidden" name="parking"
                value="{{ $ah['parking'] }}">
            </div>

            <div class="conf-wrap">
                <label for="insurance">保険対応：</label>
                <div class="conf">
                    {{ $ah['insurance'] }}
                </div>
                <input type="hidden" name="insurance"
                value="{{ $ah['insurance'] }}">
            </div>

            <div class="conf-wrap">
                <label for="hp">ホームページ：</label>
                <div class="conf">
                    {{ $ah['hp'] }}
                </div>
                <input type="hidden" name="hp"
                value="{{ $ah['hp'] }}">
            </div>

            <input type="hidden" name="user_id" id="user_id" value="{{ $ah['user_id'] }}">

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