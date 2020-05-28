<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/list.css')}}">
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
                            <form method="post" action="/transfer_input">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="hidden" name="name" value="{{$user->name}}">
                                <input type="image" src="/img/ogoru_btn.png" id="ogoru_btn">
                            </form>
                        </td>
                     </tr>
                  @endforeach
                  </table>
              </div>

    <!-- js -->
    </body>
</html>