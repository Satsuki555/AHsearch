<!-- うちの子カルテ登録画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/pet.css">
    <title>AHsearchうちの子カルテ</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>

        <h1>うちの子カルテ登録</h1>

        <form action="{{ route('myPet_confirm') }}" method="post">
        @csrf

        <label for="name">名前を入力してください。</label>
        @if($errors -> has('name'))
            <div class="err">
                {{ $errors -> first('name')}}
            </div>
        @endif
        <input type="text" name="name" id="name" class="input" placeholder="名前" value="{{ old('name') }}">

        <label for="animal">動物種を入力してください。<br>
        (例)犬、猫、うさぎetc</label>
        @if($errors -> has('animal'))
            <div class="err">
                {{ $errors -> first('animal')}}
            </div>
        @endif
        <input type="text" name="animal" id="animal" class="input" placeholder="動物種" value="{{ old('animal') }}">

        <label for="breed">品種を入力してください。<br>
        (例)トイプードル、マンチカン、ネザーランドドワーフetc</label>
        @if($errors -> has('breed'))
            <div class="err">
                {{ $errors -> first('breed')}}
            </div>
        @endif
        <input type="text" name="breed" id="breed" class="input" placeholder="品種" value="{{ old('breed') }}">

        <label for="birth">生年月日を入力してください。</label>
        @if($errors -> has('birth'))
            <div class="err">
                {{ $errors -> first('birth')}}
            </div>
        @endif
        <input type="date" name="birth" id="birth" class="input" placeholder="生年月日" value="{{ old('birth') }}">

        <label for="birth">性別を選択してください。</label>
        <select name="sex">
        @if($errors -> has('sex'))
            <div class="err">
                {{ $errors -> first('sex')}}
            </div>
        @endif
        @if(old('sex'))
            <option value="{{ old('sex') }}">{{ old('sex') }}</option>
        @endif
        <option value="不明">不明</option>
        <option value="男の子">男の子</option>
        <option value="女の子">女の子</option>
        </select>

        <label for="rv_day">直近の狂犬病ワクチン接種日を入力してください。</label>
        @if($errors -> has('rv_day'))
            <div class="err">
                {{ $errors -> first('rv_day')}}
            </div>
        @endif
        <input type="date" name="rv_day" id="rv_day" class="input" placeholder="狂犬病ワクチン接種日" value="{{ old('rv_day') }}">

        <label for="vac_day">直近の混合ワクチン接種日を入力してください。</label>
        @if($errors -> has('vac_day'))
            <div class="err">
                {{ $errors -> first('vac_day')}}
            </div>
        @endif
        <input type="date" name="vac_day" id="vac_day" class="input" placeholder="混合ワクチン接種日" value="{{ old('vac_day') }}">

        <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">

        <div class="btns">
            <a href="{{ route('myPets') }}"><button class="back" type="button">戻る</button></a>
            <button type="submit" class="send">確認</button>
        </div>

    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>