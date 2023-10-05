<!-- 画像追加画面 -->

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

    <main class="main">

        <h1>病院情報編集</h1>

        <form action="{{ route('ah_img_update_complet',$ah['id']) }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="ah_img">動物病院の写真をアップロードしてください。</label>
        @if($errors -> has('ah_img'))
            <div class="err">
                {{ $errors -> first('ah_img')}}
            </div>
        @endif
        <input type="file" name="ah_img" id="ah_img"  placeholder="写真" 
        value="{{ old('ah_img') }}">


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