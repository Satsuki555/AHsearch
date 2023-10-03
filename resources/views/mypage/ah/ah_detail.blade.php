<!-- 病院情報の詳細画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/css/component.css">
    <link rel="stylesheet" href="./../assets/css/pet_detail.css">
    <title>AHsearch病院情報</title>
</head>
<body>
    @include('/compornents.login_header')


    <main>

    <div class="basic">

        <div class="basic-top">
            <img src="./../storage/ah_img/{{ $ah->ah_img }}" alt="ah_img" class="input_img">

            <div class="span-wrap">
                <span class="name-span">{{ $ah->name }}</span>
            </div>
        </div>

        <div class="p-wrap">
            <p>病院説明：{{ $ah->explanation }}<br>
            診察時間：{{ $ah->time }}<br>
            診察可能動物：{{ $ah->animal }}<br>
            緊急対応：{{ $ah->emergency }}<br>
            トリミング：{{ $ah->trimming }}<br>
            ペットホテル：{{ $ah->hotel }}<br>
            予約：{{ $ah->reservation }}<br>
            住所：{{ $ah->address }}<br>
            電話番号：{{ $ah->tel }}<br>
            駐車場(台)：{{ $ah->parking }}<br>
            保険対応：{{ $ah->insurance }}<br>
            ホームページ：{{ $ah->hp }}<br></p>
        </div>

        <a href="{{ route('ah_img_update',$ah->id) }}"><button class="update">写真を変更する</button></a>
        <a href="{{ route('ah_update',$ah->id) }}"><button class="update">病院情報を変更する</button></a>
    </div>

        <form action="/ah_delete/{{ $ah['id'] }}" method="post" id = "contact-form" onSubmit="return checkDelete()">
            @csrf

            <div class="btns">
                <button class="back" type="button" onClick="history.back()">戻る</button>

                <button type="submit" id="delete" class="send" onclick=>削除</button></td>
            </div>
        </form>
    

    <script>
        function checkDelete(){
            if(window.confirm('削除してよろしいですか？')){
                return true;
            }else{
                return false;
            }
        }
	</script>


    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>