<!-- ペット情報の詳細画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/css/component.css">
    <link rel="stylesheet" href="./../assets/css/pet_detail.css">
    <title>AHsearchうちの子カルテ</title>
</head>
<body>
    @include('/compornents.login_header')


    <main>

    <div class="pdf-btn">
    <a href="{{ route('pdf',$pet->id)}}"><button class="send">PDF出力</button></a>
    </div>

    <div class="basic">

        <div class="basic-top">
            @if($pet->pet_img)
            <img src="./../storage/pet_img/{{ $pet->pet_img }}" alt="pet_img" class="input_img">
            @else
            <img src="./../img/not-img.png" alt="not-img" class="input_img">
            @endif

            <div class="span-wrap">
                <span class="name-span">{{ $pet->name }}　</span>
                <span class="sub-span">ちゃん</span>
            </div>
        </div>

        <div class="p-wrap">
            <p>動物種：{{ $pet->animal }}<br>
            品種：{{ $pet->breed }}<br>
            生年月日：{{ $pet->birth }}<br>
            性別：{{ $pet->sex }}<br>
            ワクチン接種日<br>
            狂犬病ワクチン：{{ $pet->rv_day }}<br>
            混合ワクチン：{{ $pet->vac_day }}<br></p>
        </div>

        <a href="{{ route('img_update',$pet->id) }}"><button class="update">写真を変更する</button></a>
        <a href="{{ route('pet_update',$pet->id) }}"><button class="update">基本情報を変更する</button></a>
    </div>

    
        <!-- <button class="back" type="button" onClick="history.back()">戻る</button> -->
        <!-- <a href="{{ route('pet_delete',$pet->id) }}"><button class="send">削除する</button></a> -->

        <form action="/pet_delete/{{ $pet['id'] }}" method="post" id = "contact-form" onSubmit="return checkDelete()">
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