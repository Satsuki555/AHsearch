<!-- ログインしている動物病院ユーザの会員情報変更画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/css/component.css">
    <link rel="stylesheet" href="./../assets/css/member.css">
    <title>AHsearch会員情報</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>

    <h1>会員情報変更</h1>

    <form action="{{ route('ah_member_confirm',$user->id) }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $user->id }}">

        <label for="name">病院名を入力してください。</label>
        @if($errors -> has('name'))
            <div class="err">
                {{ $errors -> first('name')}}
            </div>
        @endif
        <input type="text" name="name" id="name" placeholder="病院名" 
        value="@if(old('name')){{ old('name') }}
        @else{{ $user->name }}@endif">

        <label for="kana">フリガナを入力してください。</label>
        @if($errors -> has('kana'))
            <div class="err">
                {{ $errors -> first('kana')}}
            </div>
        @endif
        <input type="text" name="kana" id="kana" placeholder="フリガナ" 
        value="@if(old('kana')){{ old('kana') }}
        @else{{ $user->kana }}@endif">

        <label for="tel">電話番号を入力してください。</label>
        @if($errors -> has('tel'))
            <div class="err">
                {{ $errors -> first('tel')}}
            </div>
        @endif
        <input type="text" name="tel" id="tel" placeholder="電話番号" 
        value="@if(old('tel')){{ old('tel') }}
        @else{{ $user->tel }}@endif">

        <label for="email">メールアドレスを入力してください。</label>
        @if($errors -> has('email'))
            <div class="err">
                {{ $errors -> first('email')}}
            </div>
        @endif
        <input type="text" name="email" id="email" placeholder="メールアドレス" 
        value="@if(old('email')){{ old('email') }}
        @else{{ $user->email }}@endif">

        <div class="btns">
        <button class="back" type="button" onClick="history.back()">戻る</button>
        <button type="submit" class="send">確認</button>
    </div>

    </form>

    </main>
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div> 
</body>
</html>