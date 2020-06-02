<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="(max-width: 900px)" href="{{ asset('css/mobile_timeline.css') }}">
        <link rel="srylesheet" media="(min-widtn: 900px)" href="{{ asset('css/pc_timeline.css') }}">
        <title>おごってタイムライン</title>
    </head>

    <body>
        
            <div class="header">
                <h1>タイムライン</h1>
                <span class="menu-toggle">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </div>

            <div id="menu-drawer">
                <input id="menu-input" type="checkbox" class="menu-unshown">
                <label id="menu-open" for="menu-input"><span></span></label>
                <label class="menu-unshown" id="menu-close" for="menu-input"></label>
                <div id="menu-content">
                    <ul class="menu-ul">
                            <li class="menu-li"><a href="mypage.html">マイページ</a></li>
                            <li class="menu-li"><a href="welcome.html">おごってくださいっ！とは</a></li>
                            <li class="menu-li"><a href="">招待</a></li>
                            <li class="menu-li"><a href="contact.html">お問い合わせ</a></li>
                    </ul>
                </div>
            </div>
        
            <div class="searchArea">
                <form action=# method="GET">
                    <input class="user-search" type="search" placeholder="おごりたいユーザーを検索">
                    <button class="search-button">検索</button>
                </form>
            </div>
        

        <div class="timeline-container">
            <div class="comment-block">
                <div class="comment-block-text">
                    <div class="name">おごられ太郎</div>
                    <div class="date">05/24</div>
                    <div class="text">誕生日迎えました！！２２歳になりました！やったーー！</div>
                </div>
                <div class="comment-icons">
                   <button id="heart">いいね</button>
                   <button id="ogoru">おごる</button>
                </div>
            </div>
        </div>
    </body>
</html>