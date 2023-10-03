<!-- 会員一覧画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/mypage.css">
    <title>AHsearch会員一覧</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>

        <h1>会員一覧</h1>

        @if(session('err_msg'))
            <p>{{ session('err_msg') }}</p>
        @endif
        <table>
            <tr>
                <th>ID</th>
                <th>名</th>
                <th>ユーザ種別</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>

                @if($user->role===0)
                <td>ペットオーナーユーザ</td>
                @elseif($user->role===1)
                <td>動物病院ユーザ</td>
                @else
                <td>管理ユーザ</td>
                @endif

                @if($user->role===1)
                    <td><a href="/ah_user_list_detail/{{ $user->id }}">詳細</a></td>
                @else
                    <td><a href="/user_list_detail/{{ $user->id }}">詳細</a></td>
                @endif
                <td>
                    <form action="/user_delete/{{ $user['id'] }}" method="post" id = "contact-form" onSubmit="return checkDelete()">
                    @csrf

                            <button type="submit" id="delete" onclick=>削除</button>
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
                </td>
            </tr>
            @endforeach
        </table>

    </main>
    
    <div class="footer">
    @include('/compornents.footer')
    @yield('f-login') 
    </div>
</body>
</html>