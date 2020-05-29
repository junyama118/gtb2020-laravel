<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>コメント入力</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="{{ asset('css/soukin_comment.css') }}">

    </head>

    <body>
        <div class="iphoneX">
            <div class="header">
                <h2>おごる(送金)</h2>
                <input type="image" src="/img/back.png" id="back_btn" onclick="history.back()">
            </div>

            <div class="user">
                <div id="icon"></div>
                <div class="usermsg">
                <span id="distUser_id">
                    {{$name}}
                </span>
                <p id="message">
                    さん
                    におごるよ！
                </p>
            </div>
            </div>

            <div class="money">
            <!-- <p>送られてきた変数は{{$amount}}</p> -->
                <div id="amount">{{$amount}}</div>
                <div id="yen">円</div>
            </div>

            <form action="/sunabar" method="POST" class="comment_area">
            <!-- {!! csrf_field() !!} -->
                    <p><label>コメントしてね！▼<br>
                    <input name="amount" value={{ $amount }} type="hidden">
                    <input name="distUser_id" value={{ $id }} type="hidden">
                    <textarea name="comment" rows="5" cols="60"></textarea></p></label>
                    {{ csrf_field() }}
                <input type="image" src="/img/next.png" id="next_btn">
            </form>

        </div>
    </body>
</html>