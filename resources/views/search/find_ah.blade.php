<!-- 検索結果の動物病院一覧 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/pet_detail.css">
    <title>AHsearch病院検索</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>
    
    <a href="{{ route('mypage') }}"><button class="back">戻る</button></a>

        <h1>病院検索</h1>

        <P>{{ $count }}</P>

        <div class="pets-btn-wrap">
            @if($ahs)
                @foreach($ahs as $ah)
                <div class="pets-btn">
                <a href="/search_detail/{{ $ah->id }}" class="pet-a" style="text-decoration:none;">
                    <img src="./../storage/ah_img/{{ $ah->ah_img }}" alt="ah_img" class="input_img">
                    <div class="find-span-wrap">
                        <span class="pet-name span">{{ $ah->name }}</span>
                        <span class="time span">診察時間：<br>{{ $ah->time }}</span>
                    </div>

                </a>
                </div>
                @endforeach
            @endif
        </div>

        <div class="btns">
            <a href="{{ route('search') }}"><button class="send">戻る</button></a>
        </div>


    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>