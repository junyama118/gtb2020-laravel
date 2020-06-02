<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"  href="{{asset('css/servicedescription.css')}}">
    </head>

    <body>
        <div class="iphoneX">
            <img src="/img/logo.png" alt="おごってくださいっ！" class="img_header_logo">

            @guest
                <button type="button" onclick="location.href='{{ route('register') }}'" class="submit_createaccount"> 
                    新規登録
                </button>
                <button type="button" onclick="location.href='{{ route('login') }}'" class="submit_login">
                    ログイン
                </button>
            @else        
                <button type="button" class="submit_login"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('ログアウト') }}
                </button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest


            <!--<h2 class="titile_servicedescription">
                サービス説明
            </h2>-->

            <img src="/img/servicedescription.png" alt="サービス説明" class="img_servicedescription">
        </div>

           
    </body>
</html>
