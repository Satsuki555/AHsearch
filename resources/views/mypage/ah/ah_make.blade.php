<!-- 病院情報　登録画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/pet.css">
    <title>AHsearch病院情報</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>

        <h1>病院情報登録</h1>

        <form action="{{ route('ah_confirm') }}" method="post">
        @csrf

        <label for="name">病院名を入力してください。</label>
        @if($errors -> has('name'))
            <div class="err">
                {{ $errors -> first('name')}}
            </div>
        @endif
        <input type="text" name="name" id="name" class="input" placeholder="名前" value="{{ old('name') }}">

        <label for="explanation">病院説明を入力してください。</label>
        @if($errors -> has('explanation'))
            <div class="err">
                {{ $errors -> first('explanation')}}
            </div>
        @endif
        <input type="text" name="explanation" id="explanation" class="input" placeholder="病院説明" value="{{ old('explanation') }}">

        <label for="time">診察時間を入力してください。</label>
        @if($errors -> has('time'))
            <div class="err">
                {{ $errors -> first('time')}}
            </div>
        @endif
        <textarea name="time" id="time" class="input" placeholder="診察時間" cols="30" rows="10">{{ old('time') }}</textarea>

        <label for="animal">診察可能動物を入力してください。<br>
        (例)犬、猫、うさぎetc</label>
        @if($errors -> has('animal'))
            <div class="err">
                {{ $errors -> first('animal')}}
            </div>
        @endif
        <input type="text" name="animal" id="animal" class="input" placeholder="診察可能動物" value="{{ old('animal') }}">

        <label for="emergency">緊急対応の有無を選択してください。</label>
        @if($errors -> has('emergency'))
            <div class="err">
                {{ $errors -> first('emergency')}}
            </div>
        @endif
        
        <select name="emergency">
        @if(old('emergency'))
            <option value="{{ old('emergency') }}">{{ old('emergency') }}</option>
        @endif
        <option value="有">有</option>
        <option value="無">無</option>
        </select>

        <label for="trimming">トリミングの有無を選択してください。</label>
        @if($errors -> has('trimming'))
            <div class="err">
                {{ $errors -> first('trimming')}}
            </div>
        @endif
        <select name="trimming">
        @if(old('trimming'))
            <option value="{{ old('trimming') }}">{{ old('trimming') }}</option>
        @endif
        <option value="有">有</option>
        <option value="無">無</option>
        </select>


        <label for="hotel">ペットホテルの有無を選択してください。</label>
        @if($errors -> has('hotel'))
            <div class="err">
                {{ $errors -> first('hotel')}}
            </div>
        @endif
        <select name="hotel">
        @if(old('hotel'))
            <option value="{{ old('hotel') }}">{{ old('hotel') }}</option>
        @endif
        <option value="有">有</option>
        <option value="無">無</option>
        </select>


        <label for="reservation">予約の有無を選択してください。</label>
        @if($errors -> has('reservation'))
            <div class="err">
                {{ $errors -> first('reservation')}}
            </div>
        @endif
        <select name="reservation">
        @if(old('reservation'))
            <option value="{{ old('reservation') }}">{{ old('reservation') }}</option>
        @endif
        <option value="有">有</option>
        <option value="無">無</option>
        </select>


        <label for="address">住所を入力してください。</label>
        @if($errors -> has('address'))
            <div class="err">
                {{ $errors -> first('address')}}
            </div>
        @endif
        <input type="text" name="address" id="address" class="input" placeholder="住所" value="{{ old('address') }}">

        <label for="tel">電話番号を入力してください。</label>
        @if($errors -> has('tel'))
            <div class="err">
                {{ $errors -> first('tel')}}
            </div>
        @endif
        <input type="text" name="tel" id="tel" class="input" placeholder="電話番号" value="{{ old('tel') }}">

        <label for="parking">駐車場の有無を入力してください。<br>駐車場がある場合は台数も入力してください。<br>
        (例)あり(5台)etc</label>
        @if($errors -> has('parking'))
            <div class="err">
                {{ $errors -> first('parking')}}
            </div>
        @endif
        <input type="text" name="parking" id="parking" class="input" placeholder="駐車場" value="{{ old('parking') }}">

        <label for="insurance">保険対応をの有無を入力してください。<br>保険対応がある場合は対応保険会社を入力してください。<br>
        (例)保険対応がある場合・・・アニコム、アイペットetc <br>
        　　保険対応がない場合・・・無</label></label>
        @if($errors -> has('insurance'))
            <div class="err">
                {{ $errors -> first('insurance')}}
            </div>
        @endif
        <input type="text" name="insurance" id="insurance" class="input" placeholder="保険対応" value="{{ old('insurance') }}">

        <label for="hp">ホームページがある場合はURLを入力してください。</label>
        @if($errors -> has('hp'))
            <div class="err">
                {{ $errors -> first('hp')}}
            </div>
        @endif
        <input type="url" name="hp" id="hp" class="input" placeholder="ホームページ" value="{{ old('hp') }}">

        <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">

        <div class="btns">
            <a href="{{ route('ah') }}"><button class="back" type="button">戻る</button></a>
            <button type="submit" class="send">確認</button>
        </div>

    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>