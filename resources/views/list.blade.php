<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/list.css">

</head>
<body>

    <div class="container">
        
    <h2>フレンド一覧</h2>

        <table class="table table-striped">
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form method="post" action="/transfer">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="image" src="/Volumes/GoogleDrive/マイドライブ/@GTB/おごってアプリ/img/ogoru_btn.png" id="ogoru_btn">
                    </form>
                </td>
            </tr>
        @endforeach
        </table>
    </div>

<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>