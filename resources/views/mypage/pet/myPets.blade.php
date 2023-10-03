<!-- ログインしているユーザのうちの子カルテ一覧 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/pet_detail.css">
    <title>AHsearchうちの子カルテ</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>
    
    <a href="{{ route('mypage') }}"><button class="back">戻る</button></a>

        <h1>うちの子カルテ</h1>

        <div class="pets-btn-wrap">
            @if($pets)
                @foreach($pets as $pet)
                <div class="pets-btn">
                <a href="/pet_detail/{{ $pet->id }}" class="pet-a" style="text-decoration:none;">
                    <img src="./../storage/pet_img/{{ $pet->pet_img }}" alt="pet_img" class="input_img">
                    <span class="pet-name">{{ $pet->name }}　</span>
                    <span class="sub-span">ちゃん</span>
                </a>
                </div>
                @endforeach
            @endif
        </div>

        <div class="btns">
            <a href="{{ route('myPet_make') }}"><button class="send">ペットを追加</button></a>
        </div>


    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>