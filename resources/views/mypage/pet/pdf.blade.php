<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>pdf output test</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @font-face{
                font-family: ipag;
                font-style: normal;
                font-weight: normal;
                src:url('{{ storage_path('fonts/ipag.ttf')}}') format('truetype');
            }
            @font-face{
                font-family: ipag;
                font-style: bold;
                font-weight: bold;
                src:url('{{ storage_path('fonts/ipag.ttf')}}') format('truetype');'
            }
            body {
                font-family: ipag;
                line-height: 80%;
            }
            .main_image {
                width: 100%;
                text-align: center;
                margin: 10px 0;
            }
            .main_image img{
                width:200px;
                height: 200px;
                object-fit: cover;
                border-radius: 50%;
                margin-left: 5%;
            }
            .sushiTable {
                border: 1px solid #000;
                border-collapse: collapse;
                width: 50%;
            }
            .sushiTable tr th{
                background: #87cefa;
                padding: 5px;
                border: 1px solid #000;
            }
            .sushiTable tr td{
                padding: 5px;
                border: 1px solid #000;
            }

        </style>
    </head>
    <body>
        <h1 style="text-align: center;">AHsearchうちの子カルテ</h1>
        
        <div class="main_image">
            @if($pet->pet_img)
            <img src="./storage/pet_img/{{$pet->pet_img}}" alt="pet_img"/>
            @else
            
            @endif
        </div>

        <div style="margin: 10% 10%; border-top: 1px solid;">

        <h2 style="margin-top: 5%;">基本情報</h2>
        
        <h3>名前：{{ $pet->name }}</h3>
        <h3>動物種：{{ $pet->animal }}</h3>
        <h3>品種：{{ $pet->breed }}</h3>
        <h3>生年月日：{{ $pet->birth }}</h3>
        <h3>性別：{{ $pet->sex }}</h3>

        </div>
                
        <div style="margin: 10% 10%; border-top: 1px solid;">

        <h2 style="margin-top: 5%;">直近のワクチン接種日</h2>

        <h3>狂犬病ワクチン：{{ $pet->rv_day }}</h3>
        <h3>混合ワクチン：{{ $pet->vac_day }}</h3>

        </div>
        
    </body>
</html>