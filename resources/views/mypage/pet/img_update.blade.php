<!-- 画像追加画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/css/component.css">
    <link rel="stylesheet" href="./../assets/css/pet.css">
    <title>AHsearchうちの子カルテ</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>

        <h1>うちの子カルテ登録</h1>

        <form action="{{ route('img_update_complet',$pet['id']) }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="pet_img">ペットの写真をアップロードしてください。</label>
        @if($errors -> has('pet_img'))
            <div class="err">
                {{ $errors -> first('pet_img')}}
            </div>
        @endif
        <input type="file" name="pet_img" id="pet_img"  placeholder="写真" 
        value="{{ old('pet_img') }}">


        <div class="btns">
            <button type="submit" name="action" value="back" class="button">戻る</button>
            <button type="submit" name="action" value="submit" class="button">送信</button>
        </div>

    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>