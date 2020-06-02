<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="(max-width: 900px)" href="{{ asset('css/mobile_inputaccountinfo.css') }}">
        <!--<link rel="srylesheet" media="(min-widtn: 900px)" href="pc_createaccount.css">-->
        <title>口座情報入力</title>
    </head>

    <body>
        <div class="iphoneX">
            <div class="title">
                <h1>口座情報を入力してください</h1>
            </div>


            <div class="inputaccountinfo-container">

                <form action="/users" method="post">
                    {{ csrf_field() }}
                    <div class="questiontitle title_branchnumber">
                        <label for="branckCode">支店番号:</label>
                    </div>
                    <div>
                        <input type="number" name="branckCode" required class="questioncolum branchnumbercolum">
                    </div>

                    <div class="questiontitle title_accountnumber">
                        <label for="accountNumber">口座番号:</label>
                    </div>
                    <div>
                        <input type="number" name="accountNumber" required class="questioncolum accountnumbercolum">
                    </div>

                    <div class="questiontitle title_token">
                        <label for="token">トークン:</label>
                    </div>
                    <div>
                        <input type="text" name="token" required class="questioncolum tokencolum">
                    </div>

                    <input type="submit" name="submitvalue" value="口座情報登録" class="submitbottom">

                </form>        
            </div>

        </div>

        

</body>
</html>
