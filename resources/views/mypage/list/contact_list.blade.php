<!-- お問い合わせ一覧画面 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/component.css">
    <link rel="stylesheet" href="./assets/css/mypage.css">
    <title>AHsearchお問い合わせ一覧</title>
</head>
<body>
    @include('/compornents.login_header')

    <main>

        <h1>お問い合わせ一覧</h1>

        @if(session('err_msg'))
            <p>{{ session('err_msg') }}</p>
        @endif
        <table>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>

                    <td><a href="/contact_list_detail/{{ $contact->id }}">詳細</a></td>
                <td>
                    <form action="/contact_delete/{{ $contact['id'] }}" method="post" id = "contact-form" onSubmit="return checkDelete()">
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