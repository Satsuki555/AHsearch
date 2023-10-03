<!-- ログインしているユーザの動物病院一覧 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/pet_detail.css">
    <title>AHsearch病院情報</title>
</head>
<body>
    @include('/compornents.login_header')

    <main class="main">
    
    <a href="{{ route('mypage') }}"><button class="back">戻る</button></a>

        <h1>病院情報</h1>

        <div class="pets-btn-wrap">
            @if($ahs)
                @foreach($ahs as $ah)
                <div class="pets-btn">
                <a href="/ah_detail/{{ $ah->id }}" class="pet-a" style="text-decoration:none;">
                    <img src="./../storage/ah_img/{{ $ah->ah_img }}" alt="ah_img" class="input_img">
                    <span class="pet-name">{{ $ah->name }}</span>
                </a>
                </div>
                @endforeach
            @endif
        </div>

        <div class="btns">
            <a href="{{ route('ah_make') }}"><button class="send">病院情報を追加</button></a>
        </div>


    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>