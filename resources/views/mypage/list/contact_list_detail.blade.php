<!-- お問い合わせ詳細 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/css/component.css">
    <link rel="stylesheet" href="./../assets/css/member.css">
    <title>AHsearchお問い合わせ</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>

    <h1>お問い合わせ</h1>

    <div class="p-wrap">
        <p>名前：{{ $contact->name }}<br>
        メールアドレス：{{ $contact->email }}<br>
        内容：{{ $contact->body }}<br>
    </div>

    <div class="btns">
        <a href="{{ route('contact_list') }}"><button class="back">戻る</button></a>
    </div>


    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>