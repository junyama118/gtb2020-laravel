<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="{{ asset('css/recive.css') }}">-
    </head>

    <body>
        <div class="iphoneX">
            <div class="header">
                <h2>おごられました！！</h2>
            </div>

            <img src="/img/ogorare_tarou.png" id="ogorare_tarou">
       

            
            <img src="/img/msg_frame.png" id="msg_frame"> 
            <div class="messeage">
                <div id="comment_first">
                    <p>やったー！<br>
                        <span id="username">
                            {{$name}}</span>
                            さんから
                    </p>
                </div>
                <div id="recive-money">
                    <p id="amount">{{$amount}}</p>
                    <p id="yen">円</p>
                </div>
                <p id="comment_second">
                    おごってもらいました！<br>
                    なに買う〜〜？
                </p>
            </div>
            <img src="/img/coin_fukidashi.png" id="coin_fukidashi">

                <div id="comment">
                    {{$comment}}<br>
                    <p id="send_username">
                        <span id="username">{{$name}}</span>より
                    </p>
                </div>
                
            </div>

            <img src="/img/coinkun.png" id="coinkun">
        

            <button type="button" onclick="location.href='./users'">
                <img src="/img/home_back.png" id="home_back"/>
            </button>
        </div>
    </body>
</html>