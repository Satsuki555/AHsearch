<!-- マイページ(権限によって表示する内容を変える) -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/mypage.css">
    <title>AHsearchマイページ</title>
</head>
<body>
@include('/compornents.login_header')

    <main>
        <h1>マイページ</h1>

        <div class="menu-wrap">
            <!-- ペットオーナーユーザ -->
            @if(Auth::user()->role===0)
            <div class="op-menu">    
                <div class="menu">    
                    <img src="./img/nikukyu.jpg" alt="nikukyu" class="mypage-img">
                    <div class="menu-text">
                        <a href="{{ route('member') }}" class="mypage-a" style="text-decoration:none;">
                        <span class="mypage-span">会員情報</span></a>
                    </div>
                </div>

                <div class="menu">
                    <img src="./img/nikukyu.jpg" alt="nikukyu" class="mypage-img">
                    <div class="menu-text">
                        <a href="{{ route('myPets') }}" class="mypage-a" style="text-decoration:none;"><span class="mypage-span">うちの子カルテ</span></a>
                    </div>
                </div>
            </div>
            @endif

            <!-- 動物病院ユーザ -->
            @if(Auth::user()->role===1)
            <div class="ah-menu">
                <div class="menu">
                    <img src="./img/nikukyu.jpg" alt="nikukyu" class="mypage-img">
                    <div class="menu-text">
                        <a href="{{ route('ah_member') }}" class="mypage-a" style="text-decoration:none;"><span class="mypage-span">会員情報</span></a>
                    </div>
                </div>

                <div class="menu">
                    <img src="./img/nikukyu.jpg" alt="nikukyu" class="mypage-img">
                    <div class="menu-text">
                        <a href="{{ route('ah') }}" class="mypage-a" style="text-decoration:none;"><span class="mypage-span">病院情報</span></a>
                    </div>
                </div>
            </div>
            @endif

            <!-- 管理ユーザ -->
            @if(Auth::user()->role===2)
            <div class="manager-menu">
                <div class="menu">    
                    <img src="./img/nikukyu.jpg" alt="nikukyu" class="mypage-img">
                    <div class="menu-text">
                        <a href="{{ route('member') }}" class="mypage-a" style="text-decoration:none;">
                        <span class="mypage-span">会員情報</span></a>
                    </div>
                </div>

                <div class="menu">
                    <img src="./img/nikukyu.jpg" alt="nikukyu" class="mypage-img">
                    <div class="menu-text">
                        <a href="{{ route('user_list') }}" class="mypage-a" style="text-decoration:none;"><span class="mypage-span">会員一覧</span></a>
                    </div>
                </div>

                <div class="menu">
                    <img src="./img/nikukyu.jpg" alt="nikukyu" class="mypage-img">
                    <div class="menu-text">
                        <a href="{{ route('contact_list') }}" class="mypage-a" style="text-decoration:none;"><span class="mypage-span">お問い合わせ一覧</span></a>
                    </div>
                </div>
            </div>
            @endif

            <div class="menu">
                <img src="./img/nikukyu.jpg" alt="nikukyu" class="mypage-img">
                <div class="menu-text">
                    <a href="{{ route('logout') }}" class="mypage-a" style="text-decoration:none;"><span class="mypage-span">ログアウト</span></a>
                </div>
            </div>
        </div>
    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>