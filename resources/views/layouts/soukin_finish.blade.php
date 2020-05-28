<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/mobile_soukin_finish.css') }}">
    </head>

    <body>

        <div class="iphoneX">
            <div class="header">
                <h2>送金手続き完了！</h2>
                <img src="/img/hanko.png" id="hanko">
            </div>


            <div class="messege">
                <img src="/img/msg_frame.png" id="msg_frame">
                <div class="comment">
                    <p><span id="username">
                        {{ $name }}</span>
                    さんに<br>
                    おごりました！<br>
                    喜んでくれるといいね！</p>
                </div>
            </div>

                <button type="button" onclick= "location.href='https://bank.sunabar.gmo-aozora.com/bank/notices/important'">
                    <img src="/img/home_back.png" id="home_back"/>
                 </button>
                 
            </div>
        </div>
           
    </body>
</html>
