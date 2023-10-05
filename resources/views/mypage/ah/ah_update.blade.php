<!-- 病院情報　登録画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/css/component.css">
    <link rel="stylesheet" href="./../assets/css/pet.css">
    <title>AHsearch病院情報</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>

        <h1>病院情報編集</h1>

        <form action="{{ route('ah_update_confirm',$ah['id']) }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $ah->id }}">

        <label for="name">病院名を入力してください。</label>
        @if($errors -> has('name'))
            <div class="err">
                {{ $errors -> first('name')}}
            </div>
        @endif
        <input type="text" name="name" id="name" class="input" placeholder="名前" 
        value="@if(old('name')){{ old('name') }}
        @else{{ $ah->name }}@endif">

        <label for="explanation">病院説明を入力してください。</label>
        @if($errors -> has('explanation'))
            <div class="err">
                {{ $errors -> first('explanation')}}
            </div>
        @endif
        <textarea name="explanation" id="explanation" class="input" placeholder="病院説明" cols="30" rows="10">@if(old('explanation')){{ old('explanation') }}
        @else{{ $ah->explanation }}@endif</textarea>

        <label for="time">診察時間を入力してください。</label>
        @if($errors -> has('time'))
            <div class="err">
                {{ $errors -> first('time')}}
            </div>
        @endif
        <textarea name="time" id="time" class="input" placeholder="診察時間" cols="30" rows="10">@if(old('time')){{ old('time') }}
        @else{{ $ah->time }}@endif</textarea>

        <label for="animal">診察可能動物を入力してください。<br>
        (例)犬、猫、うさぎetc</label>
        @if($errors -> has('animal'))
            <div class="err">
                {{ $errors -> first('animal')}}
            </div>
        @endif
        <input type="text" name="animal" id="animal" class="input" placeholder="診察可能動物" 
        value="@if(old('animal')){{ old('animal') }}
        @else{{ $ah->animal }}@endif">


        
        <label for="emergency">緊急対応の有無を選択してください。</label>
        <select name="emergency">
        @if($errors -> has('emergency'))
            <div class="err">
                {{ $errors -> first('emergency')}}
            </div>
        @endif
        <option value="@if(old('emergency')){{ old('emergency') }}
        @else{{ $ah->emergency }}@endif">@if(old('emergency')){{ old('emergency') }}
        @else{{ $ah->emergency }}@endif</option>
        <option value="不明">不明</option>
        <option value="男の子">男の子</option>
        <option value="女の子">女の子</option>
        </select>

        <label for="trimming">トリミングの有無を選択してください。</label>
        <select name="trimming">
        @if($errors -> has('trimming'))
            <div class="err">
                {{ $errors -> first('trimming')}}
            </div>
        @endif
        <option value="@if(old('trimming')){{ old('trimming') }}
        @else{{ $ah->trimming }}@endif">@if(old('trimming')){{ old('trimming') }}
        @else{{ $ah->trimming }}@endif</option>
        <option value="不明">不明</option>
        <option value="男の子">男の子</option>
        <option value="女の子">女の子</option>
        </select>

        <label for="hotel">ペットホテルの有無を選択してください。</label>
        <select name="hotel">
        @if($errors -> has('hotel'))
            <div class="err">
                {{ $errors -> first('hotel')}}
            </div>
        @endif
        <option value="@if(old('hotel')){{ old('hotel') }}
        @else{{ $ah->hotel }}@endif">@if(old('hotel')){{ old('hotel') }}
        @else{{ $ah->hotel }}@endif</option>
        <option value="不明">不明</option>
        <option value="男の子">男の子</option>
        <option value="女の子">女の子</option>
        </select>

        <label for="reservation">予約の有無を選択してください。</label>
        <select name="reservation">
        @if($errors -> has('reservation'))
            <div class="err">
                {{ $errors -> first('reservation')}}
            </div>
        @endif
        <option value="@if(old('reservation')){{ old('reservation') }}
        @else{{ $ah->reservation }}@endif">@if(old('reservation')){{ old('reservation') }}
        @else{{ $ah->reservation }}@endif</option>
        <option value="不明">不明</option>
        <option value="男の子">男の子</option>
        <option value="女の子">女の子</option>
        </select>

        <label for="address">住所を入力してください。</label>
        @if($errors -> has('address'))
            <div class="err">
                {{ $errors -> first('address')}}
            </div>
        @endif
        <input type="text" name="address" id="address" class="input" placeholder="住所" value="@if(old('address')){{ old('address') }}
        @else{{ $ah->address }}@endif">

        <label for="tel">電話番号を入力してください。</label>
        @if($errors -> has('tel'))
            <div class="err">
                {{ $errors -> first('tel')}}
            </div>
        @endif
        <input type="text" name="tel" id="tel" class="input" placeholder="電話番号" value="@if(old('tel')){{ old('tel') }}
        @else{{ $ah->tel }}@endif">

        <label for="parking">駐車場の有無を入力してください。<br>駐車場がある場合は台数も入力してください。<br>
        (例)あり(5台)etc</label>
        @if($errors -> has('parking'))
            <div class="err">
                {{ $errors -> first('parking')}}
            </div>
        @endif
        <input type="text" name="parking" id="parking" class="input" placeholder="駐車場" value="@if(old('parking')){{ old('parking') }}
        @else{{ $ah->parking }}@endif">

        <label for="insurance">保険対応をの有無を入力してください。<br>保険対応がある場合は対応保険会社を入力してください。<br>
        (例)保険対応がある場合・・・アニコム、アイペットetc <br>
        　　保険対応がない場合・・・無</label></label>
        @if($errors -> has('insurance'))
            <div class="err">
                {{ $errors -> first('insurance')}}
            </div>
        @endif
        <input type="text" name="insurance" id="insurance" class="input" placeholder="保険対応" value="@if(old('insurance')){{ old('insurance') }}
        @else{{ $ah->insurance }}@endif">

        <label for="hp">ホームページがある場合はURLを入力してください。</label>
        @if($errors -> has('hp'))
            <div class="err">
                {{ $errors -> first('hp')}}
            </div>
        @endif
        <input type="url" name="hp" id="hp" class="input" placeholder="ホームページ" value="@if(old('hp')){{ old('hp') }}
        @else{{ $ah->hp }}@endif">
        
        <input type="hidden" name="user_id" id="user_id" value="@if(old('user_id')){{ old('user_id') }}
        @else{{ $ah->user_id }}@endif">

        <div class="btns">
        <button class="back" type="button" onClick="history.back()">戻る</button>
            <button type="submit" class="send">確認</button>
        </div>

    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>