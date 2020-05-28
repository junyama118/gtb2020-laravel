<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/Volumes/GoogleDrive/マイドライブ/@GTB/おごってアプリ/list.css">
        <meta name="viewport" content="width=device-width,initial-scale=1">

    </head>
    <body>

        <div class="container">
            <div class="header">
                <h2>フレンド一覧</h2>
            </div>
        
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
    </body>
</html>